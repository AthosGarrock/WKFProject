<?php 

require_once 'CoreModel.php';
/**
* 
*/
class CardModel extends CoreModel
{

//NOUVELLE CARTE
	public function add(Library $data, $a_id, $d_id = NULL){

		$req = empty($d_id)	?('INSERT INTO card(c_def, c_account_fk, c_model_fk) VALUES (:c_def, :c_account_fk, :c_model_fk)')
							:('INSERT INTO card(c_def, c_account_fk, c_model_fk, c_deck_fk) VALUES (:c_def, :c_account_fk, :c_model_fk, :c_deck_fk)');

		//Ignore this if you arn't using generateDeck()					
			if (!empty($d_id))
				$values[':c_deck_fk'] = $d_id;
			

		$values[':c_def'] = $data->getMDef();
		$values[':c_account_fk'] = $a_id;
		$values[':c_model_fk'] = $data->getMId();

		$this->MakeStatement($req, $values);
	}

/**
* @param Card model
*/

//UPDATE 
	public function update(Card $card){		
		$sql = NULL;
		$values = [];

		foreach ($card->drain() as $key => $value) {
			//INSERTION	
				$values[":".$key] = [$value];
			//SQL GENERATION
				if($key != 'c_id'){
					$sql += $key.'= :'.$key.',';
				}
		}

		$values[] = $card->getCId();

		$req = ("UPDATE card SET {$sql} WHERE c_id= :c_id");

		$this->MakeStatement($req, $values);
	}

//DELETE - MODEL SUPPRESSION
	public function delete($c_id){
		$req = ('DELETE FROM card WHERE c_id = :c_id');

		$values = [	':id' => $id ];

		$this->MakeStatement($req, $values);

	}

/**
* @return new Card
*/
	public function get($c_id){
		$req = ('SELECT * FROM card WHERE titre = :titre');

		$param = [':titre' => $c_id];

		return new Card($this->MakeSelect($req, $param));
	}

/**
* @return ARRAY with ALL CARD ARRAYS.
*/
	public function getAll(){
		$req = ('SELECT * FROM card');
		return $this->MakeSelect($req);
	}

/**
* @return ARRAY with card arrays.
*/
	public function getByDeck($d_id){
		$req = ('SELECT * FROM card WHERE c_deck_fk = :d_id');
		$param = [':d_id'=> $d_id];

		return $this->MakeSelect($req, $param);
	}



	public function attack(Card $atk, Object $target, LibraryModel $lm, CoreModel $model){

		//On récupère l'attaque :
		//$attack = $lm->get(m_id)->getMAttack;
		$attack = $lm->get($atk->getCModFk())->getMAttack();

		if ($target instanceof Card) {
			//On récupère la défense restante de la cible :
				$def = $target->getCDef();

				//Application des dommages
				$target->setCDef($def - $atk);
				$this->update($target);
		}
		elseif ($target instanceof Player) {
			//On récupère la défense restante de la cible :
				$def = $target->getPDef();

				//Application des dommages
				$target->setPDef($def - $atk);
				$this->update($target);
		}
		else{
			echo "<span class='error'>Cible invalide.</span>";
			return false;
		}
	}

}

 ?>