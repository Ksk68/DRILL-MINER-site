<?php   

    include_once 'start_session.php';

    //ligação á base de dados
    function conexao(){
        $server_name = "127.0.0.1";
        $username = "root";
        $password = "";
        $db_name = "site";

        $mysqli = new mysqli($server_name,$username,$password,$db_name); //ligação a base de dados

        if ($mysqli->connect_error) {
            die("Erro ao conectar ao banco de dados: " . $mysqli->connect_error);
        }

        $mysqli->query("SET SESSION wait_timeout = 400"); // 5 minutos

        return $mysqli;
    }

    // Verificar o login
    function verificar_login ($email, $pass){ 
        
        /*
            NE -> Email sem nada
            NP -> Password sem nada
            N -> Nada no email e na password
            L -> Login bem feito
            P -> password incorreta
            E -> email não existe
        */ 

        if (empty($email) && empty($pass)) {
            return "N";
        }else if (empty($email) ){
            return "NE";
        }else if (empty($pass)) {
            return "NP";
        }

        $mysqli = conexao();

        $stmt = $mysqli->prepare("SELECT password,tipo_de_estatuto FROM user WHERE email = ?");

        if (!$stmt) {
            die("Erro ao preparar a consulta: " . $mysqli->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if(password_verify($pass, $row['password'])){
                if ($row['tipo_de_estatuto'] == 'admin'){
                    return 'LA';
                }else{
                    return 'L';
                }

            } else {
                return "P";
            }
        } else {
            return "E";
        } 
    }


    //criar um user
    function sign_in( $nome, $email, $pass){

        /*
            NEP -> Nada no Email e na Password
            NNE -> Nada no Nome e no Email
            NNP -> Nada no Nome e na Password

            NE -> Email sem nada
            NP -> Password sem nada
            NN -> Nome sem nada

            JE -> Já existe esse Email
            JN -> Já existe esse Nome

            N -> Nada no email, na password e no nome
            S -> Sign in bem feito
        */ 

        if (empty($email) && empty($pass) && empty($nome)) {
            return "N";
        }else if (empty($pass) && empty($email)){
            return "NEP";
        }else if (empty($email) && empty($nome)){
            return "NNE";
        }else if (empty($pass) && empty($nome)){
            return "NNP";
        }else if (empty($email) ){
            return "NE";
        }else if (empty($pass)){
            return "NP";
        }else if (empty($nome)) {
            return "NN";
        }

        $mysqli = conexao();
        $hashedPassword = password_hash($pass, null);
        $tipo = 'user';

        $stmt = $mysqli->prepare("INSERT INTO user(nome,email,password,tipo_de_estatuto) VALUES (?,?,?,?)");
        $stmt->bind_param("sss", $nome , $email, $hashedPassword, $tipo);
        $stmt->execute();
        
        return "S";
    }

    // pegar o nome do user ou mod ou admin
    function get_nome($email){
        $mysqli = conexao();
        $stmt = $mysqli->prepare("SELECT nome FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['nome'];

    }

    //pegar a informação para os admins
    function get_info(){
        $mysqli = conexao();


        $stmt = $mysqli->prepare("SELECT COUNT(user_id) AS Q_user FROM user");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $Q_user = $row['Q_user'];
        $stmt->close();
        

        $stmt = $mysqli->prepare("SELECT COUNT(user_id) AS Q_mod FROM user WHERE tipo_de_estatuto = 'mod'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $Q_mod = $row['Q_mod'];
        $stmt->close();

        $stmt = $mysqli->prepare("SELECT COUNT(user_id) AS Q_admin FROM user WHERE tipo_de_estatuto = 'admin'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $Q_admin = $row['Q_admin'];
        $stmt->close();

        $stmt = $mysqli->prepare("SELECT COUNT(review_id) AS Q_feedback FROM review");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $Q_feedback = $row['Q_feedback'];
        $stmt->close();
        
        return $Q_user . " " . $Q_mod . " " . $Q_admin . " " . $Q_feedback;
    }


       

?>