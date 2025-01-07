<?php

    session_start();

    $nome = $_SESSION['nome'] ?? '';
    $email = $_SESSION['email'] ?? '';
    $erro = $_SESSION['erro'] ?? '';

    // Limpar mensagens
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['erro']);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign_in - Drill Miner</title>
    <link rel="stylesheet" href="/site/css/Tema.css">
    <link rel="stylesheet" href="/site/css/login_sign.css">
</head>
<body>
    <div class="menu">
        <nav>
            <img src="img/logo-removebg-preview.png">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="teste.html">Sobre</a></li>
                <li><a href="login.php" class="active">Login</a></li>
            </ul>
        </nav>
    </div>

    <div class="login-container">
        <div class="login-box">
            <h1>Sign in</h1>
            <form action="php/criar_user.php" method="POST">

                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Insira seu nome" value="<?php echo htmlspecialchars($nome); ?>">

                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Insira seu email" value="<?php echo htmlspecialchars($email); ?>">

                <label for="password">Senha</label>
                <input type="password" name="password" placeholder="Insira sua senha">
                
                <!-- se tiver algum erro vai mostrar -->
                <?php if (!empty($erro)): ?>
                    <div class="erro">
                        <?php echo htmlspecialchars($erro); ?>
                    </div>
                <?php endif; ?>

                <button type="submit" name="btn" >Entrar</button>
                <p class="signup">Já tens conta? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>

    <footer class="final_pagina">
        <div class="final_pagina-container">
            <div class="final_pagina-setor sobre">
                <h2>Sobre Nós</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec elementum dui. Curabitur at massa eros. Aenean eget sapien purus.</p>
            </div>
    
            <div class="final_pagina-setor links">
                <h2>Links Rápidos</h2>
                <ul>
                    <li><a href="index.html">Início</a></li>
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="sign_in.html">Sign in</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </div>
    
            <div class="final_pagina-setor contactos">
                <h2>Contacto</h2>
                <p><strong>Email:</strong> contato@exemplo.com</p>
                <p><strong>Telefone:</strong> +123 456 789</p>
            </div>
        </div>
    
        <div class="final_pagina-fim">
            <p>&copy; 2024 Drill Miner | Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
