<?php 
     
    if(isset($_POST['send']) AND !empty($_POST['email']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])
        AND !empty($_POST['objet']) AND !empty($_POST['message']))
    {
        require("fctsql.php");

        $email = securisation($_POST["email"]);
        $nom = securisation($_POST["nom"]);
        $prenom = securisation($_POST["prenom"]);
        $objet = securisation($_POST["objet"]);
		$message = securisation($_POST["message"]);	
        
        if(require('connexion.php'))
        {
            $sendmail = $req = mysqli_query($connexion, "INSERT INTO Mails(Email, Nom, Prenom, Objet, Messages) 
            VALUES ('$email','$nom','$prenom','$objet','$message')");

            if($sendmail)
            {
                $validation = "🎉Votre message a bien été envoyé ! <br> Merci de nous avoir contacté.🎉";
            }
        }
        

    }
     



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contactez-nous</title>
</head>
<body id="contact">
    <?php include('header.php'); ?>
    <div class="pgcon">

    <h3 class="titre">Contactez-nous via ce formulaire</h3>
    <?php 
        if(isset($validation))
        {
            echo '<p style ="color: green; font-weight:bold; text-align:center; ">'.$validation.'</p>';
        }
    
    ?>

    <form action="" method="post">
        <input type="email" name="email" placeholder="Entrez votre adresse mail">
        <input type="text" name="nom" placeholder="Entrez votre Nom">
        <input type="text" name="prenom" placeholder="Entrez votre Prénom">
        <input type="text" name="objet" placeholder="Entrez l'objet de votre message">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Entrez votre message"></textarea>
        <input type="submit" value="Envoyer"name = "send">
    </form>

    </div>








    <?php include('footer.php'); ?>
</body>
</html>