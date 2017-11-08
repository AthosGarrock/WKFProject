<!DOCTYPE html>
<html>
	<head>
		<title>WKF - Connexion</title>
		<style>@import url("assets/css/interface_connexion.css") all;</style>
	</head>
<body>
	<?php 
		if (!empty($_GET['form_conn']) AND ($_GET['form_conn']=='oui')){
				include 'form_connect.php';
		}
	?>
	<header>
		<div class="header_content">
			<img class="main_logo" src="assets/images/Logo.png" alt="logo">
		</div>

		<p class="interface_propagande">
			Connexion deuxième joueur :
		</p>
	</header>

	<main>
		<div class="interface_connexion">
			<a href="?form_conn=oui">Connexion :</a>
		</div>	
	</main>

	<footer>
		<img src="assets\images\logo_team6.png" alt="logo team6" class="logo_t6">
		<img src="assets\images\tous_droits_reserves.png" alt="tous_droits_reserves.png" class="tous_droits_reserves">
		<!-- Réseaux sociaux -->
		<div class="logo_container">
			<a href="#" class="logo_resaux_sociaux"><img src="assets\images\logo_fb2.png" alt="facebook logo" ></a>
			<a href="#" class="logo_resaux_sociaux"><img src="assets\images\logo_instagram2.png" alt="instagram logo"></a>
			<a href="#" class="logo_resaux_sociaux"><img src="assets\images\logo_twitter2.png" alt="twitter logo"></a>
			<a href="#" class="logo_resaux_sociaux"><img src="assets\images\logo_youtube2.png" alt="youtube logo"></a>
		</div>
	</footer>

</body>
</html>