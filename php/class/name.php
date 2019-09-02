<?php /**
 * 
 */
class Name extends Connection
{
	protected $name;

	function __construct($name)
	{
		parent::__construct();
		parent::getConnection();
		$this->name=$name;
	}
	function exists(){
		$res=$this->conn->prepare("select name from users where name like ?");
		$res->bindparam(1,$this->name);
		$res->execute();
		if($res->fetch()>0)
			return true;

			return false;
	}
} ?>