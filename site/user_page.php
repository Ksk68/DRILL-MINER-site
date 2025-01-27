<?php
    include_once './php/start_session.php';
    include_once './php/db.php';

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user - Drill Miner</title>
    <link rel="stylesheet" href="css/tema.css"> 
    <link rel="stylesheet" href="css/user_page.css"> 
</head> 
<body>
    <div class="menu">
        <nav>
            <img src="img/logo.png">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="sobre.php">Sobre</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <h1>Editar Perfil</h1>
        <form method="POST" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome"  value="<?php echo $_SESSION['nome'] ?>">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" >
            
            <label for="senha">Nova Password:</label>
            <input type="password" id="senha" name="senha">
            
            <button type="submit">Editar as Alterações</button>
        </form>
        <form method="POST" action="php/logout.php">
            <button type="submit" class="logout">Logout</button>
        </form>
        
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