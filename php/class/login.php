<?php /**
 * 
 */
class Login extends Connection
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
	function check(){
		$res=$this->conn->prepare("select name from users where name like ? and pwd like ?");
		$res->bindparam(1,$this->name);
		$res->bindparam(2,$this->pwd);
		$res->execute();
		if($res->fetch()>0)
			return true;

			return false;
	}
} ?>