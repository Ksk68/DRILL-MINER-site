<?php
    include_once 'start_session.php';

    $_SESSION['user'] = '';
    $_SESSION['nome'] = '';

    header("Location: ../login.php");
    exit();
?>