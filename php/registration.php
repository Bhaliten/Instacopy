<?php 
	require 'class/connection.php';
	require 'class/registration.php';
	$info="";

	if(isset($_POST["reg"])){
		$name=trim($_POST["name"]);
		$pwd=trim(sha1($_POST["pwd"]));

		$r=new Registration($name,$pwd);
		$r->execute();
		$info="Sikeres Regisztráció!";
		$file=fopen("users/$name.php", "w");
		fwrite($file, '<div id="full">'.$name.'</div>

<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>');
		fclose($file);
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Regisztráció</title>
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
 						<input type="password" name="pwd2" id="pwd2" placeholder="jelszó újra..">
 					</td>
 				</tr>
 				<tr>
 					<td>
 						<input type="submit" name="reg" id="reg" class="btn btn-primary" value="Regisztráció">
 					</td>
 				</tr>
 				<tr>
 					<td>
 						<a href="login.php">Már van felhasználóm</a>
 					</td>
 				</tr>
 			</table>
 		</form>
 	</div>
 	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
 	<script type="text/javascript" src="../js/reg.js"></script>
 </body>
 </html>