<?php
    session_start();

    include 'db.php';

    if(isset($_POST['btn'])){
        $nome = $_POST['nome'] ?? ''; //pegar o nome que o user pos no input
        $email = $_POST['email'] ?? ''; //pegar o email que o user pos no input
        $pass = $_POST['password']; //pegar a password que o user pos no input
    }

    $user = sign_in($nome,$email, $pass);

    

    if ($user == "N"){
        $_SESSION['erro']  = "Email, password e nome sem nada";
    }else if ($user == "NNE"){
        $_SESSION['erro']  = "Email e nome sem nada";
    }else if ($user == "NNP"){
        $_SESSION['erro']  = "Password e nome sem nada";
    }else if ($user == "NEP"){
        $_SESSION['erro']  = "Email e password sem nada";
    }else if($user == "NP"){
        $_SESSION['erro']  = "Password sem nada";
    }else if($user == "NE"){
        $_SESSION['erro']  = "Email sem nada";
    }else if($user == "NN"){
        $_SESSION['erro']  = "Nome sem nada";
    }else if($user == "S"){
        header("Location: ../index.html");
        exit();
    }
    
    $_SESSION['email'] = $email;
    $_SESSION['nome'] = $nome; 
    header("Location: ../sign_in.php");
    exit();


?>