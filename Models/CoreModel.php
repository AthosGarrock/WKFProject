<?php 

abstract class CoreModel
{
	const host = 'localhost';
	const db = 'game';
	const user = 'root';
	const pass = NULL;

	private static $_pdo;

	public function __construct()
	{
		if(self::$_pdo == NULL)
		{
			self::$_pdo = new PDO('mysql:host='.self::host.';dbname='.self::db.';charset=utf8', self::user, self::pass);
			self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		//$this->_pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
	}

	protected static function GetPdo()
	{
		return self::$_pdo;
	}

	protected function makeStatement($sql, $params = array())
	{
		$statement = false;
		if(count($params) == 0)
		{
			$statement = self::$_pdo->query($sql);
		}
		else
		{
			if(($statement = self::$_pdo->prepare($sql)) !== false)
			{
				foreach ($params as $placeholder => $value)
				{
					if($statement->bindValue($placeholder, $value==='' ? null : $value) === false)
						return false;
				}
				if(!$statement->execute())
				{
					return false;
				}
			}
		}
		
		return $statement;
	}

	protected function makeSelect($sql, $params = array(), $fetchStyle = PDO::FETCH_ASSOC, $fetchArg = NULL)
	{
		$statement = $this->MakeStatement($sql, $params);

		if($statement === false)
		{
			return false;
		}

		$data = is_null($fetchArg) ? $statement->fetchAll($fetchStyle) : $statement->fetchAll($fetchStyle, $fetchArg);
		$statement->closeCursor();

		return $data;
	}
}