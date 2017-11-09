<?php 

function deck_init($deck_ini){
	$ds;
	foreach ($deck_ini as $card) {
		$deck[] = $card['c_id'];
	}
	return $ds;
}



 ?>