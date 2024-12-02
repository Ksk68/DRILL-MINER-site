<?php   
    function conexao(){
        $server_name = "127.0.0.1";
        $username = "root";
        $password = "";
        $db_name = "volei";

        $conexao = new mysqli($server_name,$username,$password,$db_name); //ligação a base de dados

        if ($conexao->connect_error){
            die("conection failed: ". $conexao->connect_error);
        }
        return $conexao;
    }

    //verificar o login
    function verificar_login ($email, $pass){ 

        if (empty($email) || empty($pass)) {
            return "nada";
        }

        $stmt = conexao()->prepare("SELECT password FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                return "login";
            } else {
                return "senha";
            }
        } else {
            return "email";
        }
    }



?>