<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Napfény Tours</title>
    <link rel="stylesheet" href="public/css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Napfény Tours</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php?page=home">Főoldal</a></li>
            <li><a href="index.php?page=images">Képek</a></li>
            <li><a href="index.php?page=contact">Kapcsolat</a></li>
            <li><a href="index.php?page=travel">CRUD</a></li>

            <?php 
            
            if (isset($_SESSION['user'])): 
            ?>
                <li><a href="index.php?page=messages">Üzenetek</a></li>
                
                <li style="background: rgba(192, 57, 43, 0.1); border-radius: 5px; padding: 0 10px;">
                    <span style="color: #2c3e50; font-size: 14px;">
                        Bejelentkezett: 
                        <?php 
                            
                            $vnev = htmlspecialchars($_SESSION['user']['lastname'] ?? '');
                            $knev = htmlspecialchars($_SESSION['user']['firstname'] ?? '');
                            $login = htmlspecialchars($_SESSION['user']['username'] ?? '');
                            echo "$vnev $knev ($login)";
                        ?>
                    </span>
                    <a href="index.php?page=login&action=logout" style="color: #c0392b; font-weight: bold; margin-left: 10px;">
                        Kilépés
                    </a>
                </li>
            <?php else: ?>
                <li><a href="index.php?page=login">Bejelentkezés</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <main>
        <?php echo $content; ?>
    </main>
</body>
</html>