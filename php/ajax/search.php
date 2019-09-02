<?php 
	require '../class/Connection.php';
	require '../class/search.php';

	$s=new Search();
	foreach ($s->getUsers($_POST["detail"]) as $v) {
		echo "<a href='users/$v.php'>$v</a><br>";
	}
 ?>