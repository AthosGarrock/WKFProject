<?php 

/**
* 
*/
class Deck
{
	private $_d_id;
	private $_d_account_fk;
	private $_hero_fk;


	function __construct(array $deck)
	{
		$this->hydrate($deck);
	}

//HYDRATATION
    public function hydrate(array $data){
        
        foreach ($data as $key => $value) {
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) {
                 $this->$method($value);
            }
           
        }
    }

    /**
     * @return mixed
     */
    public function getDId()
    {
        return $this->_d_id;
    }

    /**
     * @param mixed $_d_id
     *
     * @return self
     */
    public function setDId($_d_id)
    {
        $this->_d_id = $_d_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDPlayerFk()
    {
        return $this->_d_player_fk;
    }

    /**
     * @param mixed $_d_player_fk
     *
     * @return self
     */
    public function setDPlayerFk($_d_player_fk)
    {
        $this->_d_player_fk = $_d_player_fk;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeroFk()
    {
        return $this->_hero_fk;
    }

    /**
     * @param mixed $_hero_fk
     *
     * @return self
     */
    public function setHeroFk($_hero_fk)
    {
        $this->_hero_fk = $_hero_fk;

        return $this;
    }
}
 ?>