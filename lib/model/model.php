<?php 

class model extends mysqlPdo{
	protected $db = null;

	public function __construct()
	{
		$this->db = parent::getInstance();
	}

	public function __get($name)
	{
		if(isset($this->$name))
		{
			return $this->$name;
		} else {
			return (null);
		}
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}
}

?>