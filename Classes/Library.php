<?php 

class Library
{
	private $_m_id;
    private $_m_title;
    private $_m_nickname;
    private $_m_team;
    private $_m_type;
    private $_m_mana;
    private $_m_atk;
    private $_m_def;
    private $_m_hero_fk;
    private $_m_color;
    private $_m_picture;
    private $_m_text;

	function __construct(array $hydration){
		$this->hydrate($hydration);
	}
//Special    
    //HYDRATION
        public function hydrate(array $lib){
            foreach ($lib as $key => $value) {
                $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
                if (method_exists($this, $method)) {
                     $this->$method($value);
                }
               
            }
        }
    //DRAIN - Get All Attributes in a single array
        public function drain(){
            $array = [];
            
            foreach ($this as $key => $value) {
                if ($key != '_id') {
                    $array[$key] = $value;
                } 
            }

            return $array;
        }
//G&S
    /**
     * @return mixed
     */
    public function getMId()
    {
        return $this->_m_id;
    }

    /**
     * @param mixed $_m_id
     *
     * @return self
     */
    public function setMId($_m_id)
    {
        $this->_m_id = $_m_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMTitle()
    {
        return $this->_m_title;
    }

    /**
     * @param mixed $_m_title
     *
     * @return self
     */
    public function setMTitle($_m_title)
    {
        $this->_m_title = $_m_title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMNickname()
    {
        return $this->_m_nickname;
    }

    /**
     * @param mixed $_m_nickname
     *
     * @return self
     */
    public function setMNickname($_m_nickname)
    {
        $this->_m_nickname = $_m_nickname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMTeam()
    {
        return $this->_m_team;
    }

    /**
     * @param mixed $_m_team
     *
     * @return self
     */
    public function setMTeam($_m_team)
    {
        $this->_m_team = $_m_team;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMType()
    {
        return $this->_m_type;
    }

    /**
     * @param mixed $_m_type
     *
     * @return self
     */
    public function setMType($_m_type)
    {
        $this->_m_type = $_m_type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMMana()
    {
        return $this->_m_mana;
    }

    /**
     * @param mixed $_m_mana
     *
     * @return self
     */
    public function setMMana($_m_mana)
    {
        $this->_m_mana = $_m_mana;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMAtk()
    {
        return $this->_m_atk;
    }

    /**
     * @param mixed $_m_atk
     *
     * @return self
     */
    public function setMAtk($_m_atk)
    {
        $this->_m_atk = $_m_atk;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMDef()
    {
        return $this->_m_def;
    }

    /**
     * @param mixed $_m_def
     *
     * @return self
     */
    public function setMDef($_m_def)
    {
        $this->_m_def = $_m_def;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMHeroFk()
    {
        return $this->_m_hero_fk;
    }

    /**
     * @param mixed $_m_hero_fk
     *
     * @return self
     */
    public function setMHeroFk($_m_hero_fk)
    {
        $this->_m_hero_fk = $_m_hero_fk;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMColor()
    {
        return $this->_m_color;
    }

    /**
     * @param mixed $_m_color
     *
     * @return self
     */
    public function setMColor($_m_color)
    {
        $this->_m_color = $_m_color;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMPicture()
    {
        return $this->_m_picture;
    }

    /**
     * @param mixed $_m_picture
     *
     * @return self
     */
    public function setMPicture($_m_picture)
    {
        $this->_m_picture = $_m_picture;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMText()
    {
        return $this->_m_text;
    }

    /**
     * @param mixed $_m_text
     *
     * @return self
     */
    public function setMText($_m_text)
    {
        $this->_m_text = $_m_text;

        return $this;
    }
}
 ?>