<?php /**
 * 
 */
class Record extends Connection
{
	
	function __construct()
	{
		parent::__construct();
		parent::getConnection();
	}

//Az adott usernek hány posztja van
	function getPosts($name){
		$res=$this->conn->prepare("select count(images.id) as db from images inner join users on users.id=images.userid where name like ?");
		$res->bindparam(1,$name);
		$res->execute();
			while($row=$res->fetch())
				return $row["db"];
	}

//Az adott usert mennyien követik
	function getFollowers($name){
		$res=$this->conn->prepare("select count(id) as db from follows where followed like (select id from users where name like ?)");
		$res->bindparam(1,$name);
		$res->execute();
			while($row=$res->fetch())
				return $row["db"];
	}

//Az adott user hány embert követ
	function getFollowed($name){
		$res=$this->conn->prepare("select count(id) as db from follows where follower like (select id from users where name like ?)");
		$res->bindparam(1,$name);
		$res->execute();
			while($row=$res->fetch())
				return $row["db"];
	}
} ?>