<?php 
require_once('cn.php');
$cr=$cn->query('SELECT distinct anneacad from inscrire order by anneacad desc');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style>
		body{
			background: url("images/66.png") left top fixed;
			font-family: sans-serif;
		}
		h1{
			color: maroon;
			margin-left: 40px;
		}
	</style>
	<title>Gestion des inscriptions a l'UIN</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 text-center" style="margin-top: 150px; background: rgba(50, 30, 2, .7);  border-radius: 30px;">
				<br><br><h3  class="text-center"><b style="color:white; background: transparent;"><u>Choisir l'annee academique:</u></b></h3><br>
				<?php while($tab=$cr->fetch()) { ?>
				<a href="acceuil.php?archive=<?= $tab['anneacad']; ?>"><button style="background: firebrick; color: white;border-radius: 10px ; border-top: 1px solid black;border-left: 1px solid black; border-right: 1px solid black; font-weight: bold;height: 40px; outline: none;  margin-bottom: 20px;"><h3><strong><?=$tab['anneacad']?>-<?=$tab['anneacad']+1;?></strong></h3></button></a><br>
				<?php } ?><br><a href="acceuil.php"><button class="btn btn-primary">Annuler</button></a><br><br>
			</div>
		</div>
	</div>
</body>
</html>