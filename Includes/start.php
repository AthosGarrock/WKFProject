<?php 
	//Récupère uniquement les id des cartes dans un array.
			require_once 'deckfunctions.php';
			$deck = deck_init($deck_ini);
		//Pioche la main initiale.
			$hand;
			for ($i=0; $i < 5; $i++) { 
				$hand[] = array_shift($p_deck);
			}
		//Transforme les tableaux en chaînes de caractère, permettant de les récupérer dans la base.
			$p_deck = implode("|", $p_deck);
			$p_hand = implode("|", $p_hand);

 ?>