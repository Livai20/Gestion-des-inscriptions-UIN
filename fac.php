<?php 
	require_once('cn.php');
	include_once('date1.php');
	$d=$cn->query("SELECT * from faculte order by photo desc");
	$d1=$cn->query("SELECT * from inscrire"); 
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style type="text/css">
		body{
			font-family: serif;
		}
	</style>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="row">
		<div class="col-md-offset-3">					
			<div class="btn btn-dark btn-block" style="background-color: lightskyblue; width: 66%">&nbsp;<h3><b>LES FACULTES A L'UIN</b></h3><i><h5><b>ANNEE UNVERSITAIRE:<?= $c; ?></b></h5></i>
			</div>
		</div><br><br>
		<div class="col-xs-12">
			<?php 
				while($tabD=$d->fetch()) { ?>	
					<div class="col-xs-3"><label for="card" class="form-label"></label>
						<img class="card-img-top" width="230px" height="210px" src="images/<?php echo $tabD['photo']; ?>" alt="card image cap">
						<div class="card-body">
							<h5 class="card-title"><b class="btn btn-default">Faculte: <?php echo $tabD['faculte']; ?></b></h5>
							<a href="<?php echo $tabD['faculte']; ?>.php" id='card' class="btn btn-primary btn-block">Aller vers la faculte <?php echo $tabD['faculte']; ?>
							</a><br><br><br>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>