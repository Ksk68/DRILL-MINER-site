<?php

    include_once './php/start_session.php';

    $user = $_SESSION['user'] ?? '';
    $nome = $_SESSION['nome'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drill Miner</title>
    <link rel="stylesheet" href="css/tema.css"> 
    <link rel="stylesheet" href="css/index.css"> 
</head> 
<body>
    <div class="menu">
        <nav>
            <img src="img/logo_final_preto.png" alt="Logo">
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="teste.html">Sobre</a></li>
                    <?php if ($user == ''): ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>

                    <?php if ($user == 'user' || $user == 'admin'): ?>

                        <?php if ($user == 'admin'): ?>
                            <li><a href="admin.php">Admin</a></li>
                        <?php endif; ?>

                        <li><a href="user_page.php"><?php echo $nome?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
    


    <div class="horizontal">
            
        <div class="info-card">
            <div class="texto">
                <h2>Título da Seção 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
            </div>
            <div class="imagem">
                <img src="img/tema do sit.png" alt="Imagem Exemplo 1">
            </div>
        </div>
  

        <div class="info-card">
            <div class="imagem">
                <img src="/5euros.jpg" alt="Imagem Exemplo 2">
            </div>
            <div class="texto">
                <h2>Título da Seção 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
            </div>
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