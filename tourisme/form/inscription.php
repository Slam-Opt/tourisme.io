<?php 
    // la SESSION démarre
    session_start();
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/index.css">
	<title>Inscription</title>
</head>

<body>
	<div class="titre">
		Portail tourisme France
	</div>

	<section class="s1">
		<article class="a1">
			<div class="logo">
				<img src="../images/logo.jpg" >
			</div>

			<div class="date-liens">
				<div class="reseaux-sociaux">
					<img src="../images/fcbk.png" alt="fcbk">
					<img src="../images/twt.png" alt="twt">
					<img src="../images/lnkdn.png" alt="lndn">
					<img src="../images/gml.png" alt="gml">
				</div>

				<div class="date-heure">
					<?php 
						$date = date('d-m-Y');
						$heure = date('H:i:s');

						echo $date . ' ' . $heure;
					?>
				</div> 
			</div>
		</article>

			<!-- DIAPO -->
			<div class="diapo">
				<img src="../images/diapo2.avif" class="diapo">
				<!-- <img src="../images/diapo.webp" class="diapo"> -->
			</div>
	</section>

		<!-- LIENS DE NAVIGATION -->
	<nav class="n1">
		<div>
			<a href="../vues/index.php">Accueil</a>
			<a href="../vues/actualites.php">Actualités</a>
			<a href="../vues/evenements.php">Événements</a>
			<a href="../form/reservation.php">Réservation</a>
			<a href="../vues/liens_utiles.php">Liens utiles</a>
			<a href="../form/connexion.php">Connexion</a>
			<a href="inscription.php">Créer un compte</a>
			<a href="../form/contacts.php">Contacts</a>
		</div>
	</nav>

	<section class="s2">
		<nav class="n2">
			<div>
				<h3>Rubrique 1</h3>
				<!-- inverse : &#10094; -->
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<!-- <a href="#">titre &#10095;</a> -->
				<!-- <a href="#">titre &#10095;</a> -->
			</div>
			<div>
				<h3>Rubrique 2</h3>
				<!-- inverse : &#10094; -->
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<a href="#">titre &#10095;</a>
				<!-- <a href="#">titre &#10095;</a> -->
			</div>
		</nav>

		<article class="a2">
			<div class="pancarte">
				<img src="../images/pancarte.jpg">
			</div>

			<div class="autre">
				<div class="milieu">
					<form method="POST" action="../controleur/verification_inscription.php">
						<hr>
						<h2>Veuillez remplir ce formulaire pour créer un compte :</h2>
						<div>
							<label>Raison sociale :</label>
							<input type="text" name="raison_sociale" required>

							<label>Étoile :</label>
							<input type="number" name="etoile" required>

							<label>Adresse :</label>
							<input type="text" name="adresse" required>

							<label>E-mail :</label>
							<input type="email" name="email" required>

							<label>Tél :</label>
							<input type="tel" name="tel" required>

							<label>Prix :</label>
							<input type="number" name="prix" required>

							<label>Logo :</label>
							<input type="file" name="logo" required>

							<label>Ville :</label>
							<input type="text" name="ville" required>

							<label>Type :</label>
							<input type="text" name="type_user" required>

							<label>Login :</label>
							<input type="text" name="login_user" required>

							<label>Mot de passe</label>
							<input type="password" name="pwd_user" required>
						</div>

						<div>
							<input type="submit" name="" value="S'inscrire">
						</div>
						<hr>
					</form>
				</div>
				
				<div class="droite">
					<!-- <img src="../images/logo-aside.webp"> -->
					<img src="../images/aside.jpg">
				</div>
			</div>
		</article>

		<!-- <aside>
			
		</aside> -->
	</section>
	
</body>
</html>