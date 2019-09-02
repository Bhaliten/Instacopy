<?php /**
 * 
 */
class Timeline extends Connection
{
	
	

	function __construct()
	{
		parent::__construct();
		parent::getConnection();
		
	}

	function getTimeline($name){
		$res=$this->conn->prepare("select name,img,imgdesc,uploaddate from images inner join users on users.id=images.userid where name like ? order by uploaddate desc");
		if(strlen($name)==0)
		$name="%".$name."%";
		$res->bindparam(1,$name);
		$res->execute();
		$array=array();
		while($row=$res->fetch())
			$array[]=$row;

		return $array;
	}
} ?>