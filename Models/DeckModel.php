<?php 

require_once 'Models/CoreModel.php';
require_once 'Classes/Deck.php';
/**
* 
*/
class DeckModel extends CoreModel
{
	
//NOUVEAU DECK
	public function add($a_id, $d_hero_fk = NULL){
		$req = ('INSERT INTO deck(d_account_fk, d_hero_fk) VALUES (:d_account_fk, :d_hero_fk)');

		$values = [ ':d_account_fk' => $a_id,
					':d_hero_fk' => $d_hero_fk];

		$this->MakeStatement($req, $values);
	}

//UPDATE - DECK EDIT
	public function update($d_hero_fk){
		$req = ("UPDATE deck SET d_hero_fk = :d_hero_fk WHERE d_id = :d_id AND d_account_fk = :d_account_fk");

		$values = [ ':d_account_fk' => $_SESSION['idJ1'],
					':d_hero_fk' => $d_hero_fk];

		$this->MakeStatement($req, $values);
	}

//DELETE - DECK SUPPRESSION
	public function delete($d_id){
		$req = ('DELETE FROM accounts(f_name, s_name, email, password) WHERE d_id = :id AND d_account_fk = :d_account_fk');

		$values = [	':id' => $d_id,
					':d_account_fk' => $_SESSION['account_id']];

		$this->MakeStatement($req, $values);

	}
/**
* @return ARRAYS OF DECK META info
*/
	public function get(string $param, $value){
		if (in_array($param, ['d_id', 'd_account_fk', 'd_hero_fk'])) {
			$req = ("SELECT * FROM deck WHERE {$param} = :{$param}");
			$param = [":{$param}" => $value];
			return $this->MakeSelect($req, $param);
		}

		return in_array($param, ['d_id', 'd_acount_fk', 'd_hero_fk']);

	}

/**
* @return all decks arrays if $account_id is null. Else return all user decks arrays.
*/
	public function getAll($account_id = NULL){
		$req = is_null($account_id)? ('SELECT * FROM decks'):('SELECT * FROM decks WHERE account_id = :account_id');
		$param = is_null($account_id)? NULL:[':account_id' => $account_id];

		return $this->MakeSelect($req, $param);
	}

	public function getDeck($id_user, $id_hero)
	{
		$sql = ('SELECT * FROM deck WHERE d_account_fk = :id_user AND d_hero_fk = :id_hero');

		$params = 	['id_user' => $id_user,
					 'id_hero' => $id_hero];
		//Return Deck item
		return new Deck($this->MakeSelect($sql, $params)[0]);
	}

}
 ?>