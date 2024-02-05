<?php 
    session_start();
    if(require("connexion2.php")) 
    {
        if(isset($_POST['connexion']))
        {
            if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']))
            {

                function securisation($donnees)
                {
                    $donnees = trim($donnees);
                    $donnees = stripslashes($donnees);
                    $donnees = strip_tags($donnees);
                    return $donnees;
                }
                $pseudo = securisation($_POST['pseudo']);
                $password = securisation($_POST['password']);

                // echo $password = password_hash($_POST['password'], PASSWORD_DEFAULT).'<br>';

                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

                $req = $connexion->prepare('SELECT * FROM vims_admin WHERE email = :email');
				$req->bindValue('email', $email);
				$req->execute();
				$res = $req->fetch(PDO::FETCH_ASSOC);

                if ($res)
                {
                    $passwordHash = $res['mdp'];


                    if(password_verify($password, $passwordHash) AND $res['id'] == 1 AND $res['pseudo'] == $pseudo)
                    {
                        $_SESSION['id'] = $res['id'];
						$_SESSION['pseudo'] = $res['pseudo'];
						$_SESSION['email'] = $res['email'];
						header("location: Admin.php");
                    }
                    else
					{
						$erreur = "Identifiants invalides !";
					}
                }
                else
				{
					$erreur1 = "Identifiants invalides !";
				}
                 

            }
            else
            {
                $erreur3 = "Remplissez tous les champs !";
            }

            
        }
        
    }
    else
    {
        $erreur2 =  "Erreur de connexion à la DB";
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="Admin.css">
    <title>Connexion</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><img src="Images/ff.png" alt="logo"></a>  
        </nav>
    </header>
    <div class="connect">
         <h2>Connexion à l'espace Administrateur</h2>
         <form action="" method="POST">
            <p>Entrez les informations necessaires</p>
            <input type="email" name="email" id="email" placeholder="Entrez votre Email">
            <input type="text" name="pseudo" id="pseudo" placeholder="Entrez votre Pseudo">
            <input type="password" name="password" id="password" placeholder="Entrez votre Mot de passe">
            <input type="submit" value="Se connecter" name="connexion" id="connexion">
            <?php 
                if (isset($erreur)) 
				{
					echo '<span style="color:red; text-align:center; font-size:15px; font-weight:bold;">'.$erreur.'</span>';
				}
				if (isset($erreur1)) 
				{
					echo '<span style="color:red; text-align:center; font-size:15px; font-weight:bold;">'.$erreur1.'</span>';
				}
                if (isset($erreur2)) 
				{
					echo '<span style="color:red; text-align:center; font-size:15px; font-weight:bold;">'.$erreur2.'</span>';
				}
                if (isset($erreur3)) 
				{
					echo '<span style="color:red; text-align:center; font-size:15px; font-weight:bold;">'.$erreur3.'</span>';
				}
            ?>
         </form>    
    </div>

    <?php include("footer.php"); ?>
</body>
</html>