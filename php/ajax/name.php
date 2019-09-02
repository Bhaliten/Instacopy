<?php 
	require '../class/connection.php';
	require '../class/name.php';

	$n=new Name($_POST["name"]);
	
	if($n->exists())
		echo "A név foglalt!";

 ?>