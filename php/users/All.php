<?php session_start();

	if(!isset($_SESSION["name"]))
		$_SESSION["name"]="";



	$name=$_POST["name"];





	require '../class/connection.php';
	require '../class/Timeline.php';
	require '../class/Record.php';
	require '../class/Follow.php';
	$r=new Record();
	$f=new Follow();
?>



 <!DOCTYPE html>
 <html>
 <head>


 	<title><?php echo $name; ?></title>



 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../../css/all.css">
 	<link rel="stylesheet" type="text/css" href="../../css/index.css">
 </head>
 <body>
 	

 	<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <a class="navbar-brand" href="../index.php">Instacopy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">



        <a class="nav-link" href="<?php echo $_SESSION["name"]; ?>.php"><?php echo $_SESSION["name"]; ?> <span class="sr-only">(current)</span></a>



        
      </li>
      <?php if(strlen($_SESSION["name"])>2){ ?>
      		<li id="goright" class="nav-item">
      			<a class="nav-link" href="../sessdes.php">Kijelentkezés</a>
      		</li>
      <?php }else{ ?>
      		<li id="goright" class="nav-item">
      			  <a class="nav-link" href="../login.php">Bejelentkezés</a>
    		</li>
    		 <li id="goright" class="nav-item">
     			   <a class="nav-link" href="../registration.php">Regisztráció</a>
      		</li>
      <?php } ?>
    </ul>
  </div>
</nav>



<div class="container-fluid">
	<div class="row">
		<h2><?php echo $name; ?></h2><img src="../../img/user/alap.jpg">

		<div id="follow" class="col-12">
			<h4>Posztok:<?php echo $r->getPosts($name); ?> Követők: <?php echo $r->getFollowers($name); ?> Követések: <?php echo $r->getFollowed($name); ?></h4>
		</div>


		<div class="col-12">
			<?php 
//Követés dolog			
				 		if(strlen($_SESSION["name"])>2 && $_SESSION["name"]!=$name){
				 	?>
				 			<button class="btn <?php if(!$f->checkFollow($_SESSION["name"],$name)){ ?>

				 				<?php echo 'btn-primary' ?> 
				 				<?php }else{ ?><?php echo 'btn-success' ?>
				 				<?php } ?>" value="
				 				<?php echo $name.'ß'.$_SESSION['name'] ?>" id="f">
				 				<?php if(!$f->checkFollow($_SESSION["name"],$name)){ ?>Követés <?php }else{ ?>Követed
				 				<?php } ?>
				 					
				 			</button>
				 			
				 	<?php 
				 		}
				 	 ?>
		</div>



		<div class="col-sm-0 col-md-2 col-lg-3" id="left">
			
		</div>


		<div class="col-sm-12 col-md-8 col-lg-6" id="cen">
			

			<div id="timeline">
				<?php 
				$empty=true;
				$t=new Timeline();
				foreach ($t->getTimeline($name) as $v) {
					
				
				 ?>
				 <div class="col-12" id="post">
				 <table class="table">
				 	<tr>
				 		
				 		<td style="float: right;">
				 			<?php echo $v["uploaddate"]; ?>
				 		</td>
				 	</tr>
				 	<tr>
				 		<td colspan="2">
				 			<img class="allimg" src="../../img/<?php echo $v["img"] ?>">
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
				 $empty=false;
				}

				if($empty)
					echo "<h3>Ha töltesz fel egy képet, itt fog megjelenni!</h3>";
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



<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../js/followAll.js"></script>


 </body>
 </html>