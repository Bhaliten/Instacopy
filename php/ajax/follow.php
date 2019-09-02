<?php 
	require '../class/Connection.php';
	require '../class/Follow.php';
	$x=$_POST["x"];

	$follower=$_POST["follower"];
	$followed=$_POST["followed"];
	$f=new Follow();
	if($x==0){
		$f->unFollow($follower,$followed);
	}else{
		$f->setFollow($follower,$followed);
	}

 ?>