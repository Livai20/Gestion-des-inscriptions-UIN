<?php require_once('cn.php');
include_once('date1.php');
$d=$cn->query("SELECT * from filiere where iddept='3' or iddept='4' or iddept='5'"); 
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
		<div class="col-md-offset-3">
			<div class="btn btn-dark btn-block" style="background-color: lightgreen; width: 66%">&nbsp;<h3><b>LES FILIERES A L'AGRONOMIE</b></h3><i><h5><b>ANNEE UNVERSITAIRE: <?= $c; ?></b></h5></i>
			</div>
		</div><br><br>
		<div class="col-xs-12">
			<?php include_once('filiere.php'); ?>
		</div>
	</div>
</body>
</html>