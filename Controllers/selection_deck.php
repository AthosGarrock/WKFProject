<?php 
session_start();

require('../Models/AccountModel.php');

if(isset($_SESSION))
{
	// var_dump($_SESSION);
}

// var_dump($_GET);
$id_hero = htmlentities($_GET['id_hero']);

$account = AccountModel::getInstance();
// var_dump( $account );

$getDeckModel =  $account->getDeckModel() ;
// var_dump( $getDeckModel );

//si seul le user1 s'est connecté, on genere le deck user1
if( !empty($_SESSION['user1']) AND empty($_SESSION['user2']) )
{
	$id_user = $_SESSION['user1'][0]['a_id'];

	$_SESSION['id_deck1'] = $account->getDeckModel()->getDeck($id_user, $id_hero)[0]['d_id'];

	header('Location:../interface_connexion.php');

}
//sinon on crée le deck du user2
else
{
	$id_user = $_SESSION['user2'][0]['a_id'];

	$_SESSION['id_deck2'] = $account->getDeckModel()->getDeck($id_user, $id_hero)[0]['d_id'];


}

	var_dump($_SESSION);






?>