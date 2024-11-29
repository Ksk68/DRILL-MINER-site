<?php   
    $codigo_jogo = 0;
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
    
    // vereficar o codigo do user
    function vereficar_codigo ($codigo){
        global $codigo_jogo;
        $query_codigo = "SELECT * FROM codigo_jogo  WHERE codigo LIKE '$codigo'";
        $resultado = mysqli_query(conexao(), $query_codigo);
        
        if ($resultado && mysqli_num_rows($resultado) == 1) { //verificar se a tabela tem mais de 0 row
            $codigo_jogo = $codigo;
            return "deu";
        } else {
            return "erro";
        }
    }

    //verificar o login
    function verificar_login ($user, $pass){ 
        echo $user, $pass;
        $query_codigo = "SELECT  FROM user WHERE = '$user' AND  =    ";
        $resultado = mysqli_query(conexao(), $query_codigo);
        if (mysqli_num_rows($resultado) == 1) { //verificar se a tabela tem 1 row
            
        } else {
            
        }
    }



?>