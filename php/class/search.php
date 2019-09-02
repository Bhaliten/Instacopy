<?php /**
 * 
 */
class Search extends Connection
{
	
	function __construct()
	{
		parent::__construct();
		parent::getConnection();
	}

	function getUsers($detail){
		$res=$this->conn->prepare("select name from users where name like ?");
		$detail=$detail."%";
		$res->bindparam(1,$detail);
		$res->execute();
		$array=array();
			while($row=$res->fetch())
				$array[]=$row["name"];
			
		return $array;
	}
} ?>