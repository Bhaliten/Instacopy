<?php session_start();

	if(!isset($_SESSION["name"]))
		$_SESSION["name"]="";

	require 'class/Connection.php';
	require 'class/img.php';
	require 'class/Timeline.php';
	require 'class/Record.php';
	require 'class/Follow.php';


	$f=new Follow();

//		SQL    ------   '2011-05-25T03:53:04.000'


//Az időt kérem le megfelelő formátumban
	$x=0;
	$time=array();

 foreach (getdate() as $v) {
 	if($x==0||$x==1||$x==2||$x==3||$x==5||$x==6)
 		$time[]=$v;

 	$x++;
 }
 $time=array_reverse($time);
 
 $t="$time[0]-$time[1]-$time[2]T$time[3]:$time[4]:$time[5]";
 


 if(isset($_POST["upload"])){
 	$img=$_FILES["file"]["name"];
 	$desc=trim($_POST["description"]);

 	$i=new Img($_SESSION["name"],$_FILES["file"]["name"],$desc,$t);

 	if($i->isAnImg()){
 		if($i->upload()){
 		
 	}else{
 		echo "Valami nem jó";
 	}
 	}else{
 		echo "Csak képet lehet";
 	}

 }
?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title>Kezdőlap</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/all.css">
 	<link rel="stylesheet" type="text/css" href="../css/index.css">
 </head>
 <body>
</div>

 	<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Instacopy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="users/<?php echo $_SESSION["name"] ?>.php"><?php echo $_SESSION["name"]; ?> <span class="sr-only">(current)</span></a>
      </li>
      <?php if(strlen($_SESSION["name"])>2){ ?>
      		<li id="goright" class="nav-item">
      			<a class="nav-link" href="sessdes.php">Kijelentkezés</a>
      		</li>
      <?php }else{ ?>
      		<li id="goright" class="nav-item">
      			  <a class="nav-link" href="login.php">Bejelentkezés</a>
    		</li>
    		 <li id="goright" class="nav-item">
     			   <a class="nav-link" href="registration.php">Regisztráció</a>
      		</li>
      <?php } ?>
      		<li>
      			<input class="nav-link form-control" type="text" id="search" name="search" placeholder="kereső">
      		</li>
    </ul>
  </div>
</nav>



<div class="container-fluid">

	<div class="row">


		<div class="col-sm-0 col-md-2 col-lg-3" id="left">
			
		</div>


		<div class="col-sm-12 col-md-8 col-lg-6" id="cen">


			<div class="col-12" style="background-color: darkgray; overflow-y: scroll; position: relative;" id="result">
		
				</div>


			<?php if(strlen($_SESSION["name"])>2){ ?>
			<div id="upload_place">
				<form method="post" action="" enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td colspan="2">
								<h3>Képfeltöltés</h3>
							</td>
						</tr>
						<tr>
							<td>
								<input type="file" id="file" name="file">
							</td>
							<td>
								<img src="" id="prev">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<textarea id="description" name="description">
									
								</textarea>
								<p id="number">255/0</p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="upload" id="upload" value="Feltöltés">
							</td>
						</tr>
					</table>
				</form>
			</div>
		<?php } ?>


			<div id="timeline">
				<?php 
				$t=new Timeline();
				foreach ($t->getTimeline("") as $v) {
					
				
				 ?>
				 <div class="col-12" id="post">
				 <table class="table">
				 	<tr>
				 		<td>
				 			<h3>
				 				<a href="users/<?php echo $v["name"] ?>.php"><?php echo $v["name"]; ?></a>



				 	<?php 
//Követés dolog			
				 		if(strlen($_SESSION["name"])>2 && $_SESSION["name"]!=$v["name"]){
				 	?>
				 			<button class="follow btn <?php if(!$f->checkFollow($_SESSION["name"],$v["name"])){ ?><?php echo 'btn-primary' ?> <?php }else{ ?><?php echo 'btn-success' ?> <?php } ?>" value="<?php echo $v['name'].'ß'.$_SESSION['name'] ?>" id="follow">
				 				<?php if(!$f->checkFollow($_SESSION["name"],$v["name"])){ ?>Követés <?php }else{ ?>Követed <?php } ?></button>
				 			</h3>
				 	<?php 
				 		}
				 	 ?>




				 		</td>
				 		<td style="float: right;">
				 			<?php echo $v["uploaddate"]; ?>
				 		</td>
				 	</tr>
				 	<tr>
				 		<td colspan="2">
				 			<img class="allimg" src="../img/<?php echo $v["img"] ?>">
				 		</td>
				 	</tr>
				 	<tr>
				 		<td colspan="2">
				 			<?php echo $v["imgdesc"]; ?>
				 		</td>
				 	</tr>
				 </table>
				 </div>
				 <?php 
				}
				  ?>
			</div>


		</div>


		<div class="col-sm-0 col-md-2 col-lg-3" id="right">
			
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript" src="../js/follow.js"></script>
<script type="text/javascript" src="../js/search.js"></script>
 </body>
 </html>