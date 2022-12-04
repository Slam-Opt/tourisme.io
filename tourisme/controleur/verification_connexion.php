<?php 
    // la SESSION démarre
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/animation.css">
	<title>Vérification connexion</title>
</head>
<body>

<h1>Vérification connexion </h1>

<?php
	// ICI il y a une différence avec le code de connexion au niveau de la boucle
	// tandisque lors de qu'ici on utilise $_POST['email'] pour vérifier la donnée qu'on insère,
	// Lors de la connexion, on utilise $donnees['email'] pour vérifier la données stockée dans table.

	// On défini les variables
	$email = $_POST['login_user'];
	$password = $_POST['pwd_user'];
	
	// D'ABORD ON EFFECTUE DES CONTRÔLES
 
	// si l'email a bien été saisi
	if(isset($_POST['login_user']))
	{
		if(isset($_POST['pwd_user']))
		{	
			 	// on se connecte dans la base de données
				require("../require/config.php");

				// Puis on sécurise les variables
				$email = filter_var($_POST['login_user'], FILTER_VALIDATE_EMAIL);
				$password = htmlspecialchars($_POST['pwd_user']);

				//on recherche d'abord si l'utilisateur est déjà inscrit dans la base de données : si ce compte existe déjà (l'email)
				// NB : pour la requête SELECT de connexion, il faut faire * : (tout sélectionner pour éviter des bugs)
				$utilisateur = $bdd->prepare("SELECT * FROM user WHERE login_user = ? AND pwd_user = ? LIMIT 1");


				// on exécute la requete pour le nombre de variables indiquées
				$utilisateur->execute(array(filter_var($_POST['login_user'], FILTER_VALIDATE_EMAIL), htmlspecialchars($_POST['pwd_user'])));

				// on va chercher tous les éléments de la table qu'on stocke dans une variable tableau
				$donnees = $utilisateur->fetchAll();

				// si la requête rencontre un email du genre et si le contenu de cet email est le même que celui de l'utilisateur

				// À SAVOIR : 

				if(count($donnees) > 0 AND filter_var($_POST['login_user'], FILTER_VALIDATE_EMAIL)==$email AND htmlspecialchars($_POST['pwd_user'])==$password)
				{
			
					//tout va bien

					// si la donnée de la 6ème colonne est de type 'admin' et si elle correspond à l'email et au mot de passe indiqué par l'utilisateur,
					if($donnees[0][3] == 'admin' AND filter_var($_POST['login_user'], FILTER_VALIDATE_EMAIL)==$adr_mail AND htmlspecialchars($_POST['pwd_user'])==$mdp)
					{	
						// alors on ouvre (ou accède à) la SESSION
						// on transmet les données de l'utilisateur aux variables de SESSION
						// ne jamais transmettre le mot de passe

						$_SESSION['code_user'] = $donnees[0][0] ;
						$_SESSION['login_user'] = $donnees[0][1] ;
						$_SESSION['pwd_user'] = $donnees[0][2];
						$_SESSION['type_user'] = $donnees[0][3];
			
						
						// l'utilisateur est redirigé vers la page indiquée
						header('Location: ../admin/admin.php');
	        			exit();

					}
					else
					{	

						// sinon, l'utilisateur est redirigé vers l'autre SESSION : l'espace membre
						// et on transmet ses données aux variables de SESSION
						$_SESSION['user'] = $donnees[0][0] ;
						$_SESSION['mdp'] = $donnees[0][1] ;
						$_SESSION['nomcompte'] = $donnees[0][2];
						$_SESSION['type_user'] = $donnees[0][3];
						
						// l'utilisateur est redirigé vers la page indiquée
						header('Location: ../vues/index.php');
	        			exit();
					} 

				}
				else
				{
					echo "Identifiant ou mot de passe incorrect !";
					header('Location: ../vues/connexion.php');



					// sinon on indique ques les identifiants sont incorrects
					// echo '<meta http-equiv="refresh" content="2; ../vues/index.php"/>';
					// die("Identifiant ou mot de passe incorrect !");
				}

					// on ferme la requête
					$utilisateur->closeCursor();
			
		}
		else
		{
			?>
				<p>Veuillez saisir mot de passe</p>
			<?php
		}

	}
	else
	{	// sinon s'il manque l'email
		echo '<meta http-equiv="refresh" content="2; ../vues/index.php"/>';
		die("Veuillez saisir l'email !");
	}

?>

	<script type="text/javascript" src="../styles/spectacle.js"></script>
</body>
<footer class="pied"></footer>
</html>