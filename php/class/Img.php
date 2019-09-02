<?php /**
 * 
 */
class Img extends Connection
{

	protected $name;
	protected $img;
	protected $desc;
	protected $date;
	
	function __construct($name,$img,$desc,$date)
	{
		parent::__construct();
		parent::getConnection();
		$this->name=$name;
		$this->img=$_FILES["file"]["name"];
		$this->desc=$desc;
		$this->date=$date;
	}
	function isAnImg(){
		$f=getimagesize($_FILES["file"]["tmp_name"]);
		if($f!==false)
			return true;

			return false;

	}
	function upload(){
		$res=$this->conn->prepare("insert into images(userid,img,imgdesc,uploaddate) values ((select id from users where name like ?),?,?,?)");
		$res->bindparam(1,$this->name);
		$res->bindparam(2,$this->img);
		$res->bindparam(3,$this->desc);
		$res->bindparam(4,$this->date);
		$res->execute();

		if (move_uploaded_file($_FILES["file"]["tmp_name"], "../img/".basename($_FILES["file"]["name"]))) 
			return true;

			return false;
		


	}
} ?>