<?php
require_once('cn.php');
$cr=$cn->query("SELECT * FROM etudiant where ide=(select max(ide) from etudiant)");
$tab=$cr->fetch();echo $tab['ide'].'<br/>'; 
echo $tab['nom'].'&nbsp;'; echo $tab['prenom'];  
?>
	

<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<title>Enregistrement reussie</title>
	<style type="text/css">
		body{font-family: cursive;}
	</style>
</head>
<body>
	
	<div class="container"><br><br><br><br><br><br><br><br>
		<div class="col-md-offset-2 col-md-7">
			<div class="alert alert-success text-center" role="alert" style="border-radius: 50px; background-color: black;">
				<h1  class="alert-heading" style="color: white;">Enregistre avec succes !!!
					<a href="acceuil.php">
					<button class="close" type="button" area-hidden="true">&times;</button>
				</h1></a>
				<p>
					<h3 class="text-center" style="color:orange;">Voulez vous l'inscrire ?</h3>
				</p>
				<hr><a href="Confirmer.php?oui=<?php echo $tab['ide'];?>">
					<button class="mb-0 btn btn-success glyphicon glyphicon-thumbs-up">&nbsp;OUI&nbsp;</button></a>
					<a href="acceuil.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button class="btn btn-danger glyphicon glyphicon-thumbs-down">&nbsp;NON</button></a>
			</div>	
		</div>
	</div>
</body>
</html>