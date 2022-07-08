<?php require_once('cn.php');
include_once('date1.php');
$d=$cn->query("SELECT * from niveau where idfil='11' order by niveau"); 
$d1=$cn->query("SELECT * from inscrire");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<div class="btn btn-dark btn-block" style="background-color: lightgreen;font-family: serif;border-radius: 30px">&nbsp;<h3><b>FACULTE D'ECONOMIE ET DES SCIENCES DE L'ADMINISTRATION</b></h3><i><h5><b>ANNEE UNVERSITAIRE: <?= $c; ?></b></h5></i><h4><b>LES SECTIONS</b></h4><h4><b>OPTION : ADMINISTRATION GENERALE</b></h4>
			</div>
		</div>
		<div class="col-md-offset-4 col-md-4" style="background-color: black; border-radius: 40px;">
			<?php 
				while($tabD=$d->fetch()){?>	
					<div>
						<a href="adm.php?id=<?php echo $tabD['niveau'];?>">
							<br><button class="btn btn-primaryH btn-block" style="border-radius: 40px; font-family: monospace;">Section <?php echo $tabD['niveau'] ?></button>
						</a>
					</div><br>
			<?php }?>
		</div>
	</div>
</body>
</html>