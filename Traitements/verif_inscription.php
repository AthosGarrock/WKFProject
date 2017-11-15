<?php 

require('../Models/AccountModel.php');

$am = AccountModel::getInstance();
$acc_data = [];
$error = [];

//Vérifie avant tout qu'il n'y a pas d'erreur de mot de passe
if($_POST['a_password'] === $_POST['a_passwordConf']){
	foreach ($_POST as $key => $value) {
		//A l'exception de la newsletter...
			if ($key != 'a_newsletter') {
				//...Vérifie que les champs ont bien été renseignés.
					if(!empty($value)){
						if ($key != "a_passwordConf") 
							$acc_data[$key] = htmlentities($value);
					}
					else # Gestion d'erreurs
						$error['$key'] = true;
			}#endNewsCheck
	}
}

if (empty($error))
{
	$id = $am->add($acc_data);
	// echo $id;

	// $am->generateDeck($id_user);

	$_GET['retour'] = 'true'; 
	header('Location:../landing.php?retour=true');
}
else
{# Si au moins une erreur a été détectée, génère un message d'erreur

	$alert = "Erreur ! Tu as oublié de remplir ton";
	foreach ($error as $key => $value) 
	{
		switch ($key) 
		{ #Complète
				case 'a_firstname':
					$alert = $alert." prénom,";
					break;
				case 'a_lastname':
					$alert = $alert." nom,";
					break;
				case 'a_username':
					$alert = $alert." nom d'utilisateur,";
					break;
				case 'a_email':
					$alert = $alert." a_email,";
					break;
				case 'a_password':
					$alert = $alert." mot de passe,";
					break;
				case 'a_passwordConf':
					$alert = $alert." de confirmer ton mot de passe !";
					break;
		}#ENDSWITCH
	}#ENDFOREACH
	echo substr_replace($alert, '!', -1, 1);
}

 ?>