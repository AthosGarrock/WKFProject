<?php 
session_start();

if( !empty($_SESSION['user1']) AND empty($_SESSION['user2']) )
{
	$lien_selection_deck1 = 'Controllers/selection_deck.php?id_hero=1';
	$lien_selection_deck2 = 'Controllers/selection_deck.php?id_hero=2';
}
else
{
	$lien_selection_deck1 = 'Board.php';
	$lien_selection_deck2 = 'Board.php';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Selection de héros</title>
		<style>@import url("assets/css/interface.css") all;</style>
	</head>

<body>
	<header>
		<div class="header_content">
			<img class="main_logo" src="assets/images/Logo.png" alt="logo">
		</div>
		<p class="interface_propagande">Choisis ton héros !</p>
	</header>

	<main>
		<div class="deck1">
			<a href="<?= $lien_selection_deck1 ?>"><img class="deck_image" src="assets\images\deck\robin_des_boites.png" alt="deck1"></a>
		</div>
		<div class="deck2">
			<a href="<?= $lien_selection_deck2 ?>"><img class="deck_image" src="assets\images\deck\tony_truand.png" alt="deck2"></a>
		</div>
	</main>

	<footer>
		<img src="assets\images\logo_team6.png" alt="logo team6" class="logo_t6">

		<img src="assets\images\tous_droits_reserves.png" alt="tous_droits_reserves.png" class="tous_droits_reserves">

		<div class="logo_container">
			<a href="#" class="logo_resaux_sociaux"><img src="assets\images\logo_fb2.png" alt="facebook logo" ></a>

			<a href="#" class="logo_resaux_sociaux"><img src="assets\images\logo_instagram2.png" alt="instagram logo"></a>

			<a href="#" class="logo_resaux_sociaux"><img src="assets\images\logo_twitter2.png" alt="twitter logo"></a>

			<a href="#" class="logo_resaux_sociaux"><img src="assets\images\logo_youtube2.png" alt="youtube logo"></a>
		</div>

	</footer>

</body>

</html>
