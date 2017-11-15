<style type="text/css">
@import url("assets/css/formulaires.css") all;
</style>			

<div class="test">
	<div class="formulaireContainer">
		<center>
		 	<form action="Controllers/verif_inscription.php" method="post">
			 	<input type="text" name="a_firstname" placeholder="prénom"><br>
			 	<input type="text" name="a_lastname" placeholder="nom de famille"><br>
			 	<input type="text" name="a_username" placeholder="nom d'utilisateur"><br>	
			 	<input type="email" name="a_email" placeholder="adresse email"><br>
			 	<input type="password" name="a_password" placeholder="mot de passe"><br>
			 	<input type="password" name="a_passwordConf" placeholder="confirme ton mot de passe"><br>

			 	<div class="newsletter">
				 	<label for="newsletter" class="check">Inscris-toi a la newsletter !!</label>
				 	<input type="checkbox" name="a_newsletter" id="newsletter" value="1"><br><br>
			 	</div>		
			 	
			 	<input type="submit" name="envoye" value="Envoyer" id="valider"><br><br>
			 	<a id="retour_ins" name="retour_ins" href="?retour=true">retour</a><br>
			 	<!-- <input type="submit" name="retour_ins" value="retour" id="retour_ins"><br>  -->	
		 	</form>
		</center>
	</div>
</div>