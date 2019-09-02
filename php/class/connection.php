<?php /**
 * 
 */
class Connection
{
	protected $name;
	protected $pwd;
	protected $host;
	protected $dbname;
	protected $conn;

	function __construct()
	{
		$this->name="root";
		$this->pwd="";
		$this->host="localhost";
		$this->dbname="insta";
	}

	function getConnection(){
		try {
			$this->conn=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->name,$this->pwd);
			$this->conn->exec("set names utf8");
		} catch (PDOException $e) {
			
		}
	}
} ?>