<?php 

require_once 'CoreModel.php';
/**
* 
*/
class LibraryModel extends CoreModel
{

//NOUVEAU MODELE
	public function add($titre, $surnom, $equipe, $type, $mana, $atk, $def){
		$req = ('INSERT INTO library(titre, surnom, equipe, type, mana, atk, def) 
				 VALUES :titre, :surnom, :equipe, :type, :mana, :atk, :def');

		$values = [	':titre' => $titre, ':surnom' => $surnom,
					':equipe' => $equipe, ':type' => $type,
					':mana' => $mana, ':atk' => $atk,
					':def' => $def];

		$this->makeStatement($req, $values);
	}

/**
* @param Card library
*/

//UPDATE - MODEL EDIT
	public function update(Library $attributes){		
		$sql = NULL;
		$values = [];

		foreach ($attributes->drain() as $key => $value) {
			//INSERTION	
				$values[":".$key] = [$value];
			//SQL GENERATION
				if($key != 'c_id'){
					$sql += $key.'= :'.$key.',';
				}
		}

		$req = ("UPDATE library SET {$sql} WHERE m_id = :m_id");

		$this->makeStatement($req, $values);
	}

//DELETE - MODEL SUPPRESSION
	public function delete($id){
		$req = ('DELETE FROM library WHERE m_id= :id');

		$values = [	':id' => $id ];

		$this->makeStatement($req, $values);

	}
/**
* @return new data by ID
*/
	public function get($id){
		$req = ('SELECT * FROM library WHERE m_id = :id');

		$param = [':id' => $id];

		return new Library($this->makeSelect($req, $param)[0]);
	}

/**
* @return ARRAY with all data turned into objects.
*/
	public function getAll(){
		$req = ('SELECT * FROM library');
		$array = [];
		foreach ($this->makeSelect($req) as $key => $value) {
			$array[] = new Library($value);
		}
		return $array;
	}


}

