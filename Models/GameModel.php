<?php 
require_once 'CoreModel.php';
/**
* 
*/
class GameModel extends CoreModel
{
//NOUVELLE PARTIE
	public function add($p1, $p2){
		$req = ('INSERT INTO game(g_player1_fk, g_player2_fk) VALUES :g_player1_fk, :g_player2_fk,');

		$values = [':g_player1_fk' => $p1, ':g_player2_fk' => $p2];
		
		$this->MakeStatement($req, $values);
	}
//DELETE - FIN DE PARTIE
	public function delete($id){
		$req = ('DELETE FROM game WHERE g_id= :g_id ');

		$values = [	':g_id' => $id ];

		$this->MakeStatement($req, $values);
	}
//Return array([])
	public function get($id){
		$req = ('SELECT * FROM game WHERE id = :id');

		$param = [':id' => $id];

		return $this->MakeSelect($req, $param);
	}

	public function getAll(){
		$req = ('SELECT * FROM players');
		return $this->MakeSelect($req);
	}

}


 ?>