<?php   
    function conexao(){
        $server_name = "127.0.0.1";
        $username = "root";
        $password = "";
        $db_name = "site";

        $conexao = new mysqli($server_name,$username,$password,$db_name); //ligação a base de dados

        if ($conexao->connect_error) {
            die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
        }

        $conexao->query("SET SESSION wait_timeout = 600"); // 10 minutos

        return $conexao;
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

        $conexao = conexao();

        $stmt = $conexao->prepare("SELECT password FROM user WHERE email = ?");

        if (!$stmt) {
            die("Erro ao preparar a consulta: " . $conexao->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if($pass == $row['password']){
                return "L";
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
    


?>