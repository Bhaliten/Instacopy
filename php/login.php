<?php 
	session_start();
	require 'class/connection.php';
	require 'class/login.php';

	$info="";

	if(isset($_POST["log"])){
		$name=trim($_POST["name"]);
		$pwd=$pwd=trim(sha1($_POST["pwd"]));

		$l=new Login($name,$pwd);
		echo $pwd;
		if($l->check()){
			$_SESSION["name"]=$name;
			header("location: index.php");
		}else{
			$info="Hibás adatok!";
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Bejelentkezés</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/all.css">
 </head>
 <body>
 	<div id="center">
 		<form method="post" action="" id="centerf">
 			<table>
 				<tr>
 					<td>
 						<p id="info"><?php echo $info; ?></p>
 					</td>
 				</tr>
 				<tr>
 					<td>
 						<input type="text" name="name" id="name" placeholder="felhasználónév..">
 					</td>
 				</tr>
 				<tr>
 					<td>
 						<input type="password" name="pwd" id="pwd" placeholder="jelszó..">
 					</td>
 				</tr>
 				<tr>
 					<td>
 						<input type="submit" name="log" id="log" class="btn btn-success" value="Bejelentkezés">
 					</td>
 				</tr>
 				<tr>
 					<td>
 						<a href="registration.php">Még nincs felhasználóm</a>
 					</td>
 				</tr>
 			</table>
 		</form>
 	</div>

 	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
 	<script type="text/javascript" src="../js/login.js"></script>
 </body>
 </html>