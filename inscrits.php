<?php require_once('cn.php');
include_once('date1.php');
if (isset($_GET['archive'])) {
	$archive=$_GET['archive'];
	$cr=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and anneacad=$archive");
	$ar=$archive+1;
	$j=$archive.'-'.$ar;
	echo $j;
}
else
$cr=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and anneacad=$a");
if(isset($_POST['recherche']) and !empty($_POST['recherche'])){
	$rech=htmlspecialchars($_POST["recherche"]);
	$cr=$cn->query('SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and nom like "%'.$rech.'%" order by nom asc');
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style>
		body{
			font-family: serif;
		}
		h1{
			color: maroon;
			margin-left: 40px;
		}
	</style>
</head>
<body>
	<div class="container-fluid"><!--style="background-color: rgba(0,50,60,50);"-->
<!--Logo on the top de la page-->
		<div class="text-left">
			<img src="images/ui.jpg" height="110" width="110" class="img-rounded">
		</div>
		<div class="text-center">
			<img src="images/uin.png" height="150" width="50%" class="img-rounded"><br><br><br>
		</div>
		<div class="row-fluid">
			<ul class="nav nav-tabs nav-fill">
				<li><a href="acceuil.php"><span class="glyphicon glyphicon-home"></span>&nbsp;<b>Acceuil</b></a></li>
				<li><a href="inscrireetud.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;<b>Inscription</b></a></li>
				<li><a href="etudiants.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>Non-Inscrits</b></a></li>
				<li class="active"><a href="inscrits.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>Inscrits</b></a></li>
<!--Sous-menu deroulable "Departements"-->
				<li>
					<a href="fac.php">
						<span class="glyphicon glyphicon-education"></span>&nbsp;<b>Facultes</b>
					</a>	
				</li>
				<li class="dropdown">
					<a href="dropdown" class="btn dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<!span class="sr-only"><!/span>
					</a>
					<ul class="btn dropdown-menu" role="dropdown">
						<li class="text-left"><a href="Sciences et Techniques.php">Sciences et Techniques</a></li>
						<li class="text-left"><a href="FESA.php">Economie et des sciences de l'administration</a></li>
						<li class="text-left"><a href="Agronomie.php">Agronomie</a></li>
						<li class="text-left"><a href="Sciences Infirmieres.php">Sciences Infirmieres</a></li>
						<li class="text-left"><a href="Chari'a et droit.php">Chari'a et Droit</a></li>
						<li class="text-left"><a href="FSIC.php">FSIC</a></li>
					</ul>
				</li>
				<li><a href="index.php"><span class="glyphicon glyphicon-arrow-down"  style="color: red;"></span>&nbsp;<b style="color: red;">Deconnexion</b></a></li>
				<nav class="navbar navbar-right">
					<form class="navbar-form navbar-right" role="search" method="post">
						<div class="form-group"><input type="search" name="recherche" class="form-control" placeholder="Recherche"></div>
						<button style="width:108px" class="btn btn-success" type="submit" name="envoyer"><i class="glyphicon glyphicon-search"></i>&nbsp;Rechercher</button>
					</form>
				</nav>
			</ul><br>
		</div>
<!--Background-color(bleue-marine) sur les 9 premieres colonnes-->
				<div class="text-center">
<!--Couleur d'arriere plan sous 'Enregistrements'-->
					<div class="btn btn-dark" style="background-color: blue;">&nbsp;<p class="btn btn-success">Les Etudiants inscrits a l'UIN pour l'annee academique <?= $c; ?></p></div><br>
					<a href="etudiants.php">
			    		<button class="text-center" data-toggle="modal"  id="inscrire">
			    			<span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter
			    		</button></a>
				</div>
<!--Creation des tables d'affichage des enregistrements-->
				<?php include_once('body.php'); ?>
			</div>		
			   </div>
			</div>
		</div>
</body>
</html>