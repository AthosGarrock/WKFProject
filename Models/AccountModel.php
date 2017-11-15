<?php 

require_once('Models/CoreModel.php');
require_once('Models/DeckModel.php');
require_once('Models/CardModel.php');
require_once('Models/LibraryModel.php');
require_once('Classes/Library.php');

/**
* 
*/
class AccountModel extends CoreModel
{
	private $_dm;
	private $_lm;
	private $_cm;

	//Récupère les managers pour la fonction generateDeck
		private function __construct(){
			parent::__construct();
			$this->_dm = new DeckModel();
			$this->_lm = new LibraryModel();
			$this->_cm = new CardModel();
		}

		public function getDeckModel()
		{
			return $this->_dm;
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

			//Result is in array due to FetchAll function. If a result is found...
				if($account = $this->makeSelect($req, $param)){
					// ...Return an Account item.
					return new Account($account[0]);
				}
				else
					return false;

		}

	/**
	* @return ARRAY with ALL USERS.
	*/
		public function getAll(){
			$req = ('SELECT * FROM account');
			return $this->makeSelect($req);
		}


}

$AM = new AccountModel;
var_dump($AM);

 ?>