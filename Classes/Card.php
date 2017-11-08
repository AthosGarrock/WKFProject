<?php 


class Card
{
    private $_c_id;
    private $_c_def;
    private $_c_account_fk;
    private $_c_mod_fk;
    private $_c_deck_fk;
    private $_c_statut; # D = deck, H = hand,  C = Cemetary 
    private $_c_match_fk = NULL;

    public function __construct(array $data){
        $this->hydrate($data);
    }
   
    public function hydrate(array $data){
        
        foreach ($data as $key => $value) {
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) 
                 $this->$method($value);
            else{
                echo "Une erreur s'est produite lors de la génération de la carte, sur le champ {$key}";
                exit();
            }
           
        }
    } 
    //Return all attributes in array :
        public function drain(){
            $array = [];
                
            foreach ($this as $key => $value) {
                if ($key != 'c_id') {
                     $array[$key] = $value;
                } 
            }
            return $array;
        }


    //G&S
        /**
         * @return mixed
         */
        public function getCId()
        {
            return $this->_c_id;
        }

        /**
         * @param mixed $_c_id
         *
         * @return self
         */
        public function setCId($_c_id)
        {
            $this->_c_id = $_c_id;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCDef()
        {
            return $this->_c_def;
        }

        /**
         * @param mixed $_c_def
         *
         * @return self
         */
        public function setCDef($_c_def)
        {
            $this->_c_def = $_c_def;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCAccountFk()
        {
            return $this->_c_account_fk;
        }

        /**
         * @param mixed $_c_account_fk
         *
         * @return self
         */
        public function setCAccountFk($_c_account_fk)
        {
            $this->_c_account_fk = $_c_account_fk;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCModFk()
        {
            return $this->_c_mod_fk;
        }

        /**
         * @param mixed $_c_mod_fk
         *
         * @return self
         */
        public function setCModFk($_c_mod_fk)
        {
            $this->_c_mod_fk = $_c_mod_fk;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCDeckFk()
        {
            return $this->_c_deck_fk;
        }

        /**
         * @param mixed $_c_deck_fk
         *
         * @return self
         */
        public function setCDeckFk($_c_deck_fk)
        {
            $this->_c_deck_fk = $_c_deck_fk;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCStatut()
        {
            return $this->_c_statut;
        }

        /**
         * @param mixed $_c_statut
         *
         * @return self
         */
        public function setCStatut($_c_statut)
        {
            $this->_c_statut = $_c_statut;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCMatchFk()
        {
            return $this->_c_match_fk;
        }

        /**
         * @param mixed $_c_match_fk
         *
         * @return self
         */
        public function setCMatchFk($_c_match_fk)
        {
            $this->_c_match_fk = $_c_match_fk;

            return $this;
        }
}







?>
