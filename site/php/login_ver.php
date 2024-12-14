<?php
    include 'db.php';
    session_start();

    if(isset($_POST['btn'])){
        $email = $_POST['email'] ?? ''; //pegar o email que o user pos no input
        $pass = $_POST['password']; //pegar a password que o user pos no input
    }

    $verificacao = verificar_login($email, $pass); // Verificar se o email existe na base de dados e se 

    if ($verificacao == "N"){
        $_SESSION['erro']  = "Email e password sem nada";
    }else if($verificacao == "NP"){
        $_SESSION['erro']  = "Password sem nada";
    }else if($verificacao == "NE"){
        $_SESSION['erro']  = "Email sem nada";
    }else if($verificacao == "L"){
        header("Location: ../index.html");
        exit();
    }else if($verificacao == "P"){
        $_SESSION['erro']  = "Password invalida";
    }else if($verificacao == "E"){
        $_SESSION['erro']  = "Email não existe";
    }

    $_SESSION['email'] = $email; 
    header("Location: ../login.php");
    exit();
?>