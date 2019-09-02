<?php /**
 * 
 */
class Follow extends Connection
{
	
	function __construct()
	{
		parent::__construct();
		parent::getConnection();
	}

	function setFollow($follower,$followed){
		$res=$this->conn->prepare("insert into follows(follower,followed) values ((select id from users where name like ?),(select id from users where name like ?))");
		$res->bindparam(1,$follower);
		$res->bindparam(2,$followed);
		$res->execute();
	}

	function unFollow($follower,$followed){
		$res=$this->conn->prepare("delete from follows where follower like (select id from users where name like ?) and followed like (select id from users where name like ?)");
		$res->bindparam(1,$follower);
		$res->bindparam(2,$followed);
		$res->execute();
	}

	function checkFollow($follower,$followed){
		$res=$this->conn->prepare("select id from follows where follower like (select id from users where name like ?) and followed like (select id from users where name like ?)");
		$res->bindparam(1,$follower);
		$res->bindparam(2,$followed);
		$res->execute();
		if($res->fetch()>0)
			return true;

			return false;
	}
} ?>