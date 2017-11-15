<?php 

require_once 'CoreModel.class.php';
/**
* 
*/
class PlayerManager extends CoreManager
{
//NOUVEAU JOUEUR
	public function add(array $data){

		$req = ("INSERT INTO player(p_def, p_mana, p_hand, p_field, p_deck, p_deck_fk, p_account_fk)
				 VALUES :p_def, :p_mana, :p_hand, :p_field, :p_deck, :p_deck_fk, :p_account_fk");
		#Envisager de "fusionner" account_fk et id -> mettre l'id du compte comme l'id du joueur

		foreach ($data as $key => $value) {
			$values[':'.$key] = $value;
		}
		
		$this->MakeStatement($req, $values);
	}
//UPDATE - USER MODIFICATION
	public function update(Player $player){
		$req = ("UPDATE players SET p_def = :p_def, 
									p_mana = :p_mana, 
									p_hand = :p_hand, 
									p_field = :p_field 
									p_deck = :p_deck
									WHERE p_id = :p_id");

		$values = [];
		
		foreach ($player->getAttributes() as $key => $value) {
			$values[':'.$key] = $value;
		}
		
		$values[':p_id'] = $player->getPId();

		$this->MakeStatement($req, $values);
	}
//DELETE - USER SUPPRESSION
	public function delete($p_id){
		$req = ('DELETE FROM players WHERE p_id = :p_id ');

		$values = [	':p_id' => $p_id ];

		$this->MakeStatement($req, $values);

	}

/**
* @return USER by NAME
*/
	public function get($p_id){
		$req = ('SELECT * FROM players WHERE username = :username');

		$param = [':username' => $name];

		return $this->MakeSelect($req, $param);
	}

/**
* @return ARRAY with ALL USERS.
*/
	public function getAll(){
		$req = ('SELECT * FROM players');
		return $this->MakeSelect($req);
	}
}

 ?>