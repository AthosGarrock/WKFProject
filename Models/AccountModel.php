<?php 

require_once 'CoreModel.php';
require('DeckModel.php');
require('CardModel.php');
require('LibraryModel.php');
require('../Classes/Library.php');

/**
* 
*/
class AccountModel extends CoreModel
{
	private static $_am_instance = NULL;
	private $_dm;
	private $_lm;
	private $_cm;

	//Récupère les managers pour la fonction generateDeck
		public function __construct(){
			parent::__construct();
			$this->_dm = DeckModel::getInstance();
			$this->_lm = LibraryModel::getInstance();
			$this->_cm = CardModel::getInstance();
		}

		public function getDeckModel()
		{
			return $this->_dm;
		}


	//SINGLETON PATTERN
		public static function getInstance(){
			if(is_null(self::$_am_instance))
				self::$_am_instance = new AccountModel();
			return self::$_am_instance;
		}
	//NOUVEAU JOUEUR
		public function add(array $data){
			$req = ('INSERT INTO account(a_firstname, a_lastname, a_username, a_email, a_password, a_newsletter) 
					 VALUES (:a_firstname, :a_lastname, :a_username, :a_email, :a_password, :a_newsletter)');

			$values = [];
			$values[':a_newsletter'] = 0;

			
			foreach ($data as $key => $value) {
				if ($key == 'a_password') 
					$values[':'.$key] = password_hash($value, PASSWORD_DEFAULT);
				else if ($key != 'envoye')
					$values[':'.$key] = $value;
			}

			if($this->makeStatement($req, $values)){
				$account = $this->makeSelect('SELECT MAX(a_id) AS id FROM account');
				$this->generateDeck($account[0]['id']);

				echo "Compte inscrit avec succès!";
			}
		}
		
		//STARTER DECK GENERATION
			private function generateDeck($account_id){
				//Création des decks
					$this->_dm->add($account_id, '1');
					$this->_dm->add($account_id, '2');
				//Récupération des modèles de cartes dans un tableau d'objets.
					$library = $this->_lm->getAll();
				//Récupération des ID des decks générés.
					$decks = $this->_dm->get('d_account_fk', $account_id);
				//Insertion - Génère un deck de 20 cartes pour chaque héros initial.
					for ($i=0; $i < 12 ; $i++) { 
						$this->_cm->add($library[$i], $account_id, $decks[0]['d_id']);
						//Doublons (Deck de 20 cartes)
						if($i < 8) 
							$this->_cm->add($library[$i], $account_id, $decks[0]['d_id']);
					}
					for ($i=12; $i < 24 ; $i++) { 
						$this->_cm->add($library[$i], $account_id, $decks[1]['d_id']);
						//Doublons 
						if ($i < 20) {
							$this->_cm->add($library[$i], $account_id, $decks[1]['d_id']);
						}
					}

			}

	//UPDATE - USER MODIFICATION
		public function update($a_email, array $data){
			$req = ("UPDATE account SET a_firstname = :a_firstname, 
										a_lastname = :a_lastname, 
										a_email = :a_email, 
										a_password = :a_password 
										WHERE a_id = :a_id");

			$values = [];
			$values['a_newsletter'] = 0;
			
			foreach ($data as $key => $value) {
				if ($key == 'password') 
					$values[':'.$key] = password_hash($value, PASSWORD_DEFAULT);
				else
					$values[':'.$key] = $value;
			}

			$this->makeStatement($req, $values);
		}
	//DELETE - USER SUPPRESSION
		public function delete($id){
			$req = ('DELETE FROM account WHERE a_id= :a_id ');

			$values = [	':a_id' => $id ];

			$this->makeStatement($req, $values);

		}

	/**
	* @return USER by NAME
	*/
		public function getByName($name){
			$req = ('SELECT * FROM account WHERE a_username = :a_username');

			$param = [':a_username' => $name];

			return $this->makeSelect($req, $param);
		}

	/**
	* @return ARRAY with ALL USERS.
	*/
		public function getAll(){
			$req = ('SELECT * FROM account');
			return $this->makeSelect($req);
		}


}

 ?>