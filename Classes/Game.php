<?php 

class Game 
{
	private $_id;
	private $_p1;
	private $_p2;

	function __construct(Player $p1, Player $p2){
		$this->_p1 = $p1;
		$this->_p2 = $p2;
	}
//G&S
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $_id
     *
     * @return self
     */
    public function setId($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getP1()
    {
        return $this->_p1;
    }

    /**
     * @param mixed $_p1
     *
     * @return self
     */
    public function setP1($_p1)
    {
        $this->_p1 = $_p1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getP2()
    {
        return $this->_p2;
    }

    /**
     * @param mixed $_p2
     *
     * @return self
     */
    public function setP2($_p2)
    {
        $this->_p2 = $_p2;

        return $this;
    }
    
}

 ?>