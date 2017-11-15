<?php 
	session_start();

	require_once('../Functions/autoloader.php');

	//Si l'autoloader ne fonctionne pas correctement:
	// require_once('../Models/AccountModel.php');
	// require_once('../Classes/Player.php');
	// require_once('../Models/PlayerModel.php');


	if(is_numeric($_GET['id_hero'])){
		if($_GET['id_hero']  > 0 AND $_GET['id_hero'] < 3)
			$id_hero = $_GET['hero'];
	}

	$account = new AccountModel();
	$pm = new PlayerModel();
	$gm = new GameModel();
	$getDM = $account->getDeckModel();


	//Si seul user1 s'est connecté, on récupère le deck d'user1. On récupère son ID, qui combiné à celui du héros, permet de récupérer le deck associé.
	if( !empty($_SESSION['user1']) AND empty($_SESSION['user2']) ){
		$id_user = unserialize($_SESSION['user1'])->getAId();
		$d_ID = $getDM->getDeck($id_user, $id_hero)->getDId();
		//Récupère les cartes du deck correspondant avant de les mélanger.
			$deck_ini = $cm->getByDeck($d_ID);
			shuffle($deck_ini);
		//Traitement du deck et de la main :
			include 'Includes/start.php';

	//On pré-enregistre les données dans un objet Player
		$p1 = new Player([	'p_account_fk'	=> $id_user,
							'p_def'			=> 20,
							'p_mana'		=> 0,
							'p_deck'		=> $p_deck,
							'p_hand'		=> $p_hand ]);
	//Qui va être ensuite traité par le PlayerModel, qui s'occupe de la requête SQL. Egalement, passe les paramètres de p1 en session grâce à serialize.
		$pm->add($p1->getAttributes());
		$_SESSION['p1'] = serialize($p1);

		header('Location:../interface_connexion.php');

	}
	//sinon on récupère le deck d'user2, où l'on répète la plupart des instructions.
	else{
		$id_user = unserialize($_SESSION(['user2']))->getAId();
		$d_id = $account->getDeckModel()->getDeck($id_user, $id_hero)->getDId();
		//Récupère les cartes du deck correspondant avant de les mélanger.
			$deck_ini = $cm->getByDeck($_SESSION['id_deck2']);
			shuffle($deck_ini);
		//Traitement du deck et de la main :
			include 'Includes/start.php';
		//On inclus tout ça dans un objet Player
			$p2 = new Player([	'p_account_fk'	=> $id_user,
								'p_def'			=> 20,
								'p_mana'		=> 0,
								'p_deck'		=> $p_deck,
								'p_hand'		=> $p_hand ]);
		//Qui va être ensuite traité par le PlayerModel, qui s'occupe de la requête SQL.
			$pm->add($p2->getAttributes());
			$_SESSION['p2'] = serialize($p2);

		//On lance alors la partie.
			$gm->add($_SESSION['user1'], $_SESSION['user2']);


	}

	var_dump($_SESSION);
?>