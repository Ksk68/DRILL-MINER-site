<?php   
    function conexao(){
        $server_name = "127.0.0.1";
        $username = "root";
        $password = "";
        $db_name = "site";

        $mysqli = new mysqli($server_name,$username,$password,$db_name); //ligação a base de dados

        if ($mysqli->connect_error) {
            die("Erro ao conectar ao banco de dados: " . $mysqli->connect_error);
        }

        $mysqli->query("SET SESSION wait_timeout = 600"); // 10 minutos

        return $mysqli;
    }

    // Verificar o login
    function verificar_login ($email, $pass){ 

        if (empty($email) && empty($pass)) {
            return "N";
        }else if (empty($email) ){
            return "NE";
        }else if (empty($pass)) {
            return "NP";
        }

        $mysqli = conexao();

        $stmt = $mysqli->prepare("SELECT password FROM user WHERE email = ?");

        if (!$stmt) {
            die("Erro ao preparar a consulta: " . $mysqli->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            if((password_verify($pass, $row['password']))){
                return "L " . $row['password'];
            } else {
                return "P";
            }
        } else {
            return "E";
        } 
    }

    /*
        NE -> Email sem nada
        NP -> Password sem nada
        N -> Nada no email e na password
        L -> Login bem feito
        P -> password incorreta
        E -> email não existe
    */ 
    
    function sign_in( $nome, $email, $pass){

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
        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $mysqli->prepare("INSERT INTO user(nome,email,password,tipo_de_estatuto) VALUES (?,?,?,'user')");
        $stmt->bind_param("sss", $nome , $email, $hashedPassword);
        $stmt->execute();

        return "S";
    }

?>