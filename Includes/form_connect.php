<style type="text/css">
@import url("assets/css/formulaires.css") all;
</style>

<div class="test">
	<div class="connectionContainer">
		<center>
			<form action="Controllers/verif_connection.php" method="POST">
		 		<input type="text" name="a_username" placeholder="nom d'utilisateur"><br>
		 		<input type="password" name="a_password" placeholder="mot de passe"><br>

		 		<input type="submit" value="Connexion" id="valider"><br><br>
		 		
		 		<a id="creeCompte" href="?creerCompte=true">Créer un compte</a><br><br>
		 		<a id="retour" name="retour" href="?retour=true">Retour</a><br>
			 </form>
		</center>
	</div>
</div>