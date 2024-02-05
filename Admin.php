<?php 
    session_start();
    if(empty($_SESSION['pseudo']) OR empty($_SESSION['email']) OR empty($_SESSION['id']))
    {
        header("location:connexion_ad.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="Admin.css">
    <title>Tableau de bord</title>
</head>
<body id="bodyad">
    <header>
        <nav>
            <a href="index.php">
                <img src="Images/ff.png">                
            </a>
            <ul>
                <il><a href="articles.php" class="liens">Articles</a></il>
                <il><a href="messages.php" class="liens">Messages</a></il>
            </ul>
            <a href="deconnexion.php" class="don">Se déconnecter</a>
        </nav>
    </header>

    <?php include("footer.php");?>
</body>
</html>