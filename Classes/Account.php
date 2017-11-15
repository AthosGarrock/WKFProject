<?php 

class Account
{
    private $_a_id;
    private $_a_username;
	private $_a_firstname;
    private $_a_lastname;
    private $_a_email;
    private $_a_password;
    private $_a_victory;
    private $_a_defeat;
    private $_a_matches;

	function __construct(array $data){
        $this->hydrate($data);
    }


//HYDRATION
    public function hydrate(array $data){
        
        foreach ($data as $key => $value) {
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) 
                 $this->$method($value);
            else{
                echo "Erreur lors de la création du compte, veuillez contacter l'administrateur du site. Erreur du champ {$key}";
                exit();
            }
           
        }
    } 

//G&S
    /**
     * @return mixed
     */
    public function getAId()
    {
        return $this->_a_id;
    }

    /**
     * @param mixed $_a_id
     *
     * @return self
     */
    public function setAId($_a_id)
    {
        $this->_a_id = $_a_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAUsername()
    {
        return $this->_a_username;
    }

    /**
     * @param mixed $_a_username
     *
     * @return self
     */
    public function setAUsername($_a_username)
    {
        $this->_a_username = $_a_username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAFirstname()
    {
        return $this->_a_firstname;
    }

    /**
     * @param mixed $_a_firstname
     *
     * @return self
     */
    public function setAFirstname($_a_firstname)
    {
        $this->_a_firstname = $_a_firstname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getALastname()
    {
        return $this->_a_lastname;
    }

    /**
     * @param mixed $_a_lastname
     *
     * @return self
     */
    public function setALastname($_a_lastname)
    {
        $this->_a_lastname = $_a_lastname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAEmail()
    {
        return $this->_a_email;
    }

    /**
     * @param mixed $_a_email
     *
     * @return self
     */
    public function setAEmail($_a_email)
    {
        $this->_a_email = $_a_email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAPassword()
    {
        return $this->_a_password;
    }

    /**
     * @param mixed $_a_password
     *
     * @return self
     */
    public function setAPassword($_a_password)
    {
        $this->_a_password = $_a_password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAVictory()
    {
        return $this->_a_victory;
    }

    /**
     * @param mixed $_a_victory
     *
     * @return self
     */
    public function setAVictory($_a_victory)
    {
        $this->_a_victory = $_a_victory;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getADefeat()
    {
        return $this->_a_defeat;
    }

    /**
     * @param mixed $_a_defeat
     *
     * @return self
     */
    public function setADefeat($_a_defeat)
    {
        $this->_a_defeat = $_a_defeat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAMatches()
    {
        return $this->_a_matches;
    }

    /**
     * @param mixed $_a_matches
     *
     * @return self
     */
    public function setAMatches($_a_matches)
    {
        $this->_a_matches = $_a_matches;

        return $this;
    }
}
?>
