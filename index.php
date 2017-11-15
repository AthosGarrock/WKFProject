<?php if(session_status() === PHP_SESSION_NONE){session_start();} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width'>

	<title>Wild Knight Fever</title>
	<link rel="shortcut icon" href="assets/css/images/tab_logo.png">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<style>/* @import url("form.css") all; */
		@import url("assets/css/landing_style.css") all;
		/*Responsive*/
		@import url("assets/css/landing_style_1200px.css") (max-width: 1200px) and (min-width:961px);
		@import url("assets/css/landing_style_960px.css") (max-width: 960px) and (min-width:720px);
		@import url("assets/css/landing_style_720px.css") (max-width: 719px) and (min-width:480px);
		@import url("assets/css/landing_style_480px.css") (max-width: 479px);
	</style>

	<script type="text/javascript" src="assets/js/lemon.js"></script>
	<!-- A FAIRE
			
		- gerer le responsive
			-Newsletter : mettre en tableau
		
		idée de proposition : 
		- ajouter un bouton pour revenir à l'accueil lors de la navigation hors de la première page 
	-->
</head> 

<body>
	<?php 
		/*NOTE - /!\  Cette section pourrait être traitée en JS, ce qui aurait davantage de sens. 
		* L'intéret d'afficher à chaque fois le reste de la page est nul en PHP puisqu'il faut recharger la page entière à chaque traitement de formulaire.
		*/

		//DEBUG
		var_dump($_SESSION);

		//Login Form
			if (!empty($_GET['form_conn']) AND ($_GET['form_conn']=='oui')){
				include 'includes/form_connect.php';
			}
		//Subscribe Form
			elseif(!empty($_GET['creerCompte']) AND $_GET['creerCompte']=='true'){
				include 'includes/form_inscr.php';
			}
		//Retour à la page
			if( (!empty($_GET['retour']) AND $_GET['retour']=='true' )){
				header("Location:index.php");
			}
		//Déconnexion
			if (!empty($_GET['form_deconn']) AND ($_GET['form_deconn']=='oui')){
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
					//Pbm de conflit d'envoi de header => Cannot modify header information
					header("Location:landing.php");
				}	
			}	
	?>
	<!-- HEADER -->
	<header>
		<div class="header_content">

			<?php 
				if( (empty($_SESSION['user1']) OR empty($_SESSION['user2'] )) ){
					echo '	<a href="?form_conn=oui" >
								<div class="connexion">CONNEXION</div>
							</a>';
				}
				else{
					echo '	<a href="?form_deconn=oui" >
								<div class="connexion">DECONNEXION</div>
							</a>';
				}
			?>	
			<img class="main_logo" src="assets/images/Logo.png" alt="logo">

			<nav>
				<ul class="main_nav">
					<li>
						<a href="#universe"><img src="assets/images/Ball.png" alt="boule de cristal">
						<p>L'UNIVERS</p></a>
					</li>
					
					<li>
						<a href="#game"><img src="assets/images/Glass.png" alt="verre">
						<p>LE JEU</p></a>
					</li>

					<li>
						<a href="#team"><img src="assets/images/Salt.png" alt="salière">
						<p>L'EQUIPE</p></a>
					</li>
	            </ul>
			</nav>

			<p class="propagande">Réserve ta soirée pour le 28 novembre !</p>

			<form action="index.html" method="post">
				<label>INSCRIS-TOI !</label><br>
				<input type="text" id="email" name="email" placeholder="Entre ton adresse email">
				<img class="lemon slice" src="assets/images/lemon.png" alt="rondelle de citron">
				<img class="lemon slice_top" src="assets/images/lemon_top.png" alt="rondelle de citron">
				<img class="lemon lime_wink toggle_lemon" src="assets/images/lemon_hover.png" alt="rondelle de citron">
				<img class="lemon happy_lemon toggle_lemon" src="assets/images/lemon_complete.png" alt="rondelle de citron">
				<br>
				<input type="submit" id="inscription_button" >
				
			</form>

			<a href="#universe"><img src="assets/images/Arrow.png" alt="flèche"></a>
		</div>

	</header>

	<main>

			<!-- UNIVERSE -->

		<section id="universe">
			<h2>L'UNIVERS</h2>
			<div class="universe_content">
				<img src="assets/images/Robin.png" alt="robin">

				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
				</div>

				<img src="assets/images/Tony.png" alt="tony">
			</div>
		</section>

			<!-- GAME -->

		<section id="game">
			<h2>LE JEU</h2>
			<article class="cards">

				<div class="card_image">
					<img src="assets\images\merlin_titi.png" alt="cartes descriptives" class="cartes_descriptives">
				</div>

				<p class="text">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, corrupti! Ut suscipit non numquam sit nostrum excepturi similique molestiae quo facere obcaecati, vero- 
				</p>

			</article>

			<article class="chicken">

				<p class="text">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, corrupti! Ut suscipit non numquam sit nostrum excepturi similique molestiae quo facere obcaecati, vero-
				</p>

				<div class="chicken_image">
					<img src="assets\images\poulettes.png" alt="poule facette" class="poule_facette">
				</div>

			</article>

		</section>

			<!-- TEAM -->

		<section id="team">
			<h2>L'ÉQUIPE</h2>

			<div class="team_container">
				<div class="logo_team6" id="aurelie"><p class="name_team6">Aurélie<br><span>designer</span></p></div>
				<div class="logo_team6" id="cecile"><p class="name_team6">Cécile<br><span>designer</span></p></div>
				<div class="logo_team6" id="clement"><p class="name_team6">Clément<br><span>designer</span></p></div>
				<div class="logo_team6" id="marine"><p class="name_team6">Marine<br><span>designer</span></p></div>
			</div>

			<div class="team_container">
				<div class="logo_team6" id="nicolas"><p class="name_team6">Nicolas<br><span>developpeur</span></p></div>
				<div class="logo_team6" id="mehdi"><p class="name_team6">Mehdi<br><span>developpeur</span></p></div>
				<div class="logo_team6" id="timothee"><p class="name_team6">Timothée<br><span>developpeur</span></p></div>
				<div class="logo_team6" id="gregory"><p class="name_team6">Gregory<br><span>developpeur</span></p></div>
			</div>
		</section>
	</main>

			<!-- FOOTER -->
	
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
