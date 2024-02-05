 <?php

	function securisation($donnees)
	{
		$donnees = trim($donnees);
		$donnees = stripslashes($donnees);
		$donnees = strip_tags($donnees);
		return $donnees;
	}


	function sendMail($prenom, $nom, $email, $objet, $message)
	{
		$to      = 'zness14programmation@gmail.com';
		$subject = $objet;
		$message = $message;
		$headers = 'From:'.$email. "\r\n" .
			'Reply-To: zness14programmation@gmail.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
	}
	function envoieMail ($ids, $objet, $message)
	{
		if(require("connexion.php"))
		{
			$req = mysqli_query($connexion, "INSERT INTO Mails(Email, Nom, Prenom, Objet, Messages) 
									VALUES ('$email','$nom','$prenom','$objet','$message')");
					
			// $req->execute();
			// $req->closeCursor();
		}
	}

	function addProduit($nom, $description, $prix)
	{
		if(require("connexion.php"))
		{
			$req = $connexion->prepare("INSERT INTO produits(Nom, Description, Prix) 
								VALUES ('$nom', '$descrition', '$prix')");
			$req->execute();
			$req->closeCursor();
			echo "Le produit a bien été ajouté !";

		}
	}

	function addUsers($pseudo, $nom, $genre, $numtel, $email, $adresse, $password)
	{
		if(require("connexion.php"))
		{
			$req = $connexion->prepare("INSERT INTO users(Pseudo, Nom, Genre, NumTel, Email, Adresse, Password) 
								VALUES ('$pseudo', '$nom', '$genre','$numtel', '$email','$adresse', '$password')");
			$req->execute();
			$req->closeCursor();
		}
	}

	function securisationEmail($email)
	{
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			return $email;
		}
		else
		{
			echo "Identifiants non valides";
		}
	}



?>