<?php
    include_once 'db.php';
    include_once 'start_session.php';

    if(isset($_POST['btn'])){
        $email = $_POST['email'] ?? ''; 
        $pass = $_POST['password']; 
    }

    $verificacao = verificar_login($email, $pass); // Verificar se o email existe na base de dados e se 
    

    if ($verificacao == "N"){
        $_SESSION['erro']  = "Email e password sem nada";
    }else if($verificacao == "NP"){
        $_SESSION['erro']  = "Password sem nada";
    }else if($verificacao == "NE"){
        $_SESSION['erro']  = "Email sem nada";
    }else if($verificacao == "L"){
        header("Location: ../index.php");
        $_SESSION['user'] = 'user';
        $_SESSION['nome'] = get_nome($email);
        exit();
    }else if($verificacao == "LA"){
        header("Location: ../index.php");
        $_SESSION['user'] = 'admin';
        $_SESSION['nome'] = get_nome($email);
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