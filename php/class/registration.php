<?php /**
 * 
 */
class Registration extends Connection
{
	protected $name;
	protected $pwd;

	function __construct($name,$pwd)
	{
		parent::__construct();
		parent::getConnection();
		$this->name=$name;
		$this->pwd=$pwd;
	}

	function execute(){
		$res=$this->conn->prepare("insert into users(name,pwd) values (?,?)");
		$res->bindparam(1,$this->name);
		$res->bindparam(2,$this->pwd);
		$res->execute();
	}
} ?>