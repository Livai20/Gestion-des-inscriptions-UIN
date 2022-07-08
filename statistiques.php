<?php require_once('cn.php');
include_once('date1.php');
$d=$cn->query("SELECT * from faculte order by photo desc");
$d1=$cn->query("SELECT * from inscrire"); 
$cr1=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and faculte.idfac='1' and anneacad=$a");
$cr2=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and faculte.idfac='2' and anneacad=$a");
$cr3=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and faculte.idfac='3' and anneacad=$a");
$cr4=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and faculte.idfac='4' and anneacad=$a");
$cr5=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and faculte.idfac='5' and anneacad=$a");
$cr6=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and faculte.idfac='6' and anneacad=$a");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style>
		body{
			background: url("images/66.png") left top fixed;font-family: cursive;
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

		<div class="text-left">
			<img src="images/ui.jpg" height="110" width="110" class="img-rounded">
		</div>
		<div class="text-center">
			<img src="images/uin.png" height="150" width="50%" class="img-rounded"><br><br><br>
		</div>
		<div class="col-md-3">
			<h3><p style="background-color:black;color: white; border-radius: 35px;" class="text-center"><b>2022-2023</b></p></h3>
			<table class="table table-hover table-bordered" style="background-color:ghostwhite;">
				<thead>
					<th><b>Nombre d'etudiants inscrits</b></th>
					<td><b>07418</b></td>
					<th><b>Nombre d'etudiants inscrits</b></th>
					<td><b>07418</b></td>
				</thead>
			</table>
		</div>
	</div>
</body>
</html>