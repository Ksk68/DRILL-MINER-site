<?php
    include 'db.php';

    if(isset($_POST['btn'])){
        $email = $_POST['']; //pegar o email que o user pos no input
        $pass = $_POST['']; //pegar a password que o user pos no input
    }

    $verificacao = verificar_login($email, $pass); // Verificar se o email existe na base de dados e se 

    if ($verificacao == "N"){
        // erro por ter nada no input do email e da pass 
    }else if($verificacao == "NP"){
        // erro por ter nada so na pass
    }else if($verificacao == "NE"){
        //erro por nao ter nada so no email
    }else if($verificacao == "L"){
        //login certo
    }else if($verificacao == "P"){
        // password invalida ao email
    }else if($verificacao == "E"){
        // email nao existe
    }

?>