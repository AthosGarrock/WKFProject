<?php 
session_start();
require('../Models/AccountModel.php');

// require 'autoloader.php';

$am = AccountModel::getInstance();


if(  !empty($_POST['a_username']) && !empty($_POST['a_password'])  )
{
	$username = htmlentities( $_POST['a_username'] );
	$password = htmlentities( $_POST['a_password'] );

	$user = $am->getByName( $username );
	
	if( count( $user ) == 1 )
	{
		if( empty( $_SESSION['user1'] ) )
		{
			$_SESSION['user1'] = $user;
			header('Location:../interface.php');

		}
		elseif( empty( $_SESSION['user2'] ) )
		{
			$_SESSION['user2'] = $user;
			header('Location:../interface.php');
		}
	}

	var_dump($_SESSION);

}

?>