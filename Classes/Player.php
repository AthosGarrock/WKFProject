<?php 

class Player
{
	private $_p_id;
	private $_p_def;
	private $_p_mana;
	private $_p_hand = [];
	private $_p_field = [];
	private $_p_deck_fk = [];
	private $_p_account_fk;

	function __construct(array $player)
	{
		$this->hydrate($player);
	}
//G&S
    /**
     * @return mixed
     */
    public function getPId()
    {
        return $this->_p_id;
    }

    /**
     * @param mixed $_p_id
     *
     * @return self
     */
    public function setPId($_p_id)
    {
        $this->_p_id = $_p_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPDef()
    {
        return $this->_p_def;
    }

    /**
     * @param mixed $_p_def
     *
     * @return self
     */
    public function setPDef($_p_def)
    {
        $this->_p_def = $_p_def;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPMana()
    {
        return $this->_p_mana;
    }

    /**
     * @param mixed $_p_mana
     *
     * @return self
     */
    public function setPMana($_p_mana)
    {
        $this->_p_mana = $_p_mana;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPField()
    {
        return $this->_p_field;
    }

    /**
     * @param mixed $_p_field
     *
     * @return self
     */
    public function setPField($_p_field)
    {
        $this->_p_field = $_p_field;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPDeck()
    {
        return $this->_p_deck;
    }

    /**
     * @param mixed $_p_deck
     *
     * @return self
     */
    public function setPDeck($_p_deck)
    {
        $this->_p_deck = $_p_deck;

        return $this;
    }



    /**
     * @return mixed
     */
    public function getPAccountFk()
    {
        return $this->_p_account_fk;
    }

    /**
     * @param mixed $_p_account_fk
     *
     * @return self
     */
    public function setPAccountFk($_p_account_fk)
    {
        $this->_p_account_fk = $_p_account_fk;

        return $this;
    }

//Special Functions
	//HYDRATION
	    public function hydrate(array $model){
	        foreach ($data as $key => $value) {
	            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
	            if (method_exists($this, $method)) {
	                 $this->$method($value);
	            }
	           
	        }
	    }
	//getAttributes - get most attributes. Useful for updating player data.
	    public function getAttributes(){
	        $array = [];
	        
	        foreach ($this as $key => $value) {
	            if ($key != '_p_id' || $key != '_p_deck_fk' || $key != '_p_account_fk') {
	                $array[$key] = $value;
	            } 
	        }
	        return $array;
	    }
}
 ?>