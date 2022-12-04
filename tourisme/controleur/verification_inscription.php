<?php
	// on démarre la session
	session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vérification compte user</title>
</head>
<body>
	<?php

		// VOICI UN CODE QUI VÉRIFIE LES DONNÉES SAISIES PAR UN UTILISATEUR AVANT QU'ELLES NE SOIENT INSÉRÉES DANS LA TABLE



		// 1° - ON INITIALISE D'ABORD LES VARIABLES  : on stocke dans les variables POST les titres des colonnes des tables, c'est-à-dire la donnée qui se trouve dans chaque colonne

		$raison_s = $_POST['raison_sociale'];
		$etoile = $_POST['etoile'];
		$adr = $_POST['adresse'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$prix = $_POST['prix'];
		$fichier = $_POST['logo'];
		$ville = $_POST['ville'];
		$user = $_POST['type_user'];
		$login = $_POST['login_user'];
		$pwd = $_POST['pwd_user'];


		// 2 ° - ENSUITE LORSQUE L'UTILISATEUR VA CLIQUER SUR 'ENVOYER', ON DEMANDE AU NAVIGATEUR DE VÉRIFIER SI CET UTILISATEUR A BIEN REMPLI LES CHAMPS (INPUT, SELECT...) DU FORMULAIRE QUI SONT OBLIGATOIRES comme ceci : 

		// si le codeanim a bien été renseigné 
		if(isset($_POST['login_user']))
		{

				// alors on se connecte dans la base de données
				require('../require/config.php');

				// Puis on défini les variables et on les sécurise
				$raison_s = $_POST['raison_sociale'];
				$etoile = $_POST['etoile'];
				$adr = $_POST['adresse'];
				$email = $_POST['email'];
				$tel = $_POST['tel'];
				$prix = $_POST['prix'];
				$fichier = $_POST['logo'];
				$ville = $_POST['ville'];
				$user = $_POST['type_user'];
				$login = $_POST['login_user'];
				$pwd = $_POST['pwd_user'];

				// on recherche d'abord si le code existe déjà dans la base de données
				$variable = $bdd->prepare("SELECT code_user FROM organisme WHERE login_user = ? LIMIT 1");

				// on exécute la requête
				$variable->execute(array(htmlspecialchars($_POST['login_user'])));

				// on va chercher tous les éléments de la table et on les stocke dans une variable $donnee
				$donnee = $variable->fetchAll();


				// si la requête rencontre plus de 0 information dans la table, et si le contenu de la colonne 'nomtypeanim' de cette table est le même que celui que l'utilisateur a saisi
				if(count($donnee) > 0 AND htmlspecialchars($_POST['login_user']) == $nom_compte AND htmlspecialchars($_POST['pwd_user']) == $prenom_compte)
				{  
						
					// alors on le signale à l'utilisateur

					echo '<meta http-equiv="refresh" content="10; ../form/inscription.php"/>';
					die("Ce compte existe déjà !");
									
				}
				else
				{  
						
					// sinon on insère les données dans la table :
					// NB : dans la requête SELECT ici, il faut toujours préciser WHERE nom_de_table = ?. Sinon il y aura des erreurs
					//NB : pour l'insertion d'une clé étrangère, il faut toujours faire une requête SELECT nom_cle_primiaire FROM nom_de_la_table WHERE ...

					$variable = $bdd->prepare("
						INSERT INTO organisme (
							code_user, 
							raison_sociale, 
							etoile, 
							adresse, 
							email, 
							tel, 
							prix, 
							logo, 
							ville, 
							type_user, 
							login_user, 
							pwd_user) 

						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

					// on récupère les données des variables (dans un tableau) afin de les manipuler : on exécute la requête

					$variable->execute(array(
						htmlspecialchars($_POST['code_user']), 
						htmlspecialchars($_POST['raison_sociale']), 
						htmlspecialchars($_POST['etoile']), 
						htmlspecialchars($_POST['adresse']), 
						htmlspecialchars($_POST['email']), 
						htmlspecialchars($_POST['tel']), 
						htmlspecialchars($_POST['prix']), 
						htmlspecialchars($_POST['logo']), 
						htmlspecialchars($_POST['ville']), 
						htmlspecialchars($_POST['type_user']), 
						htmlspecialchars($_POST['login_user']), 
						htmlspecialchars($_POST['pwd_user'])));
									
				}
									
					// et on précise à l'utilisateur que tout s'est bien passé

					echo '<meta http-equiv="refresh" content="10; ../vues/index.php"/>';
					die("Compte créée avec succès !!!");

								
					// Puis on ferme la requête
					$variable->closeCursor();
           

		}				
		else
		{

		  // sinon s'il manque le nom

			echo '<meta http-equiv="refresh" content="1; ../form/inscription.php"/>';
			die("Veuillez renseigner le nom d'utilisateur !");
		}

	?>

</body>
</html>