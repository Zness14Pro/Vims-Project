<?php 
    session_start();
    if(empty($_SESSION['pseudo']) OR empty($_SESSION['email']) OR empty($_SESSION['id']))
    {
        header("location:connexion_ad.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles2.css">
    <title>Document</title>
</head>
<body>
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
    <?php 
        require("connexion.php");
        $req_users = mysqli_query($connexion, "SELECT * FROM mails ORDER BY Id DESC");
        $req = mysqli_fetch_all($req_users);
    ?>
    <div class="tableau">

    <table>
        <caption>Messages reçu par les utilisateurs</caption>
        <tr>
            <th>Email</th>
            <th>Nom</th>
            <th>Objet</th>
            <th>Messages</th>
            <th>Date et Heure</th>
            <th>Supprimer</th>
        </tr>
        <?php 
            foreach($req as $res)
            { 
            ?>
            <tr>
                <td><?php echo $res[1];?></td>
                <td><?php echo $res[2];?></td>
                <td><?php echo $res[4];?></td>
                <td><?php echo $res[5];?></td>
                <td><?php echo $res[6];?></td>
                <td style="text-align: center; padding:2px;"><a href="del.php?Id=<?=$res[0]?>" class="delete_bt"><img src="delete.svg" 
                        style="height:35px;"></a>
                </td>
            </tr>
            <?php 
            } 
            ?>  

    </table>
    </div>
    <?php require('footer.php');?>
</body>
</html>