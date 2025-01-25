<?php
    include_once './php/start_session.php';
    include_once './php/db.php';

    if($_SESSION['user'] != 'admin') {
        header("Location: ../index.php");
    }

    $info = get_info();

    $nome = $_SESSION['nome'];

    
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Drill Miner</title>
    <link rel="stylesheet" href="css/tema.css"> 
    <link rel="stylesheet" href="css/admin.css"> 
</head> 
<body>
    <div class="menu">
        <nav>
            <img src="img/logo_final_preto.png">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="user_page.php"><?php echo $nome?></a></li>
            </ul>
        </nav>
    </div>

    <div class="dashboard">
        <h1>Bem-vindo, ADM</h1>
        <div class="cards">
            <?php if (!empty($info)): ?>
                <?php foreach ($info as $info): ?>
                    <div class="card">
                        <h2><?php echo htmlspecialchars($info['nome']);?></h2>
                        <p>Total: <?php echo htmlspecialchars($info['quantidade']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php $i = 0; endif; ?>
        
            
        </div>
        <div class="links_adm">
            <h2>HUB</h2>
            <ul>
                <li><a href="mod_user.php">Modificar Users</a></li>
                <li><a href="mod_texto.php">Modificar Textos</a></li>
            </ul>
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
                    <li><a href="index.php">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="sign_in.php">Sign in</a></li>
                    <li><a href="login.php">Login</a></li>
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