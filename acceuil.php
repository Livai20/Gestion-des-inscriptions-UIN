<?php require_once('cn.php');
if (isset($_GET['archive'])) {
	$archive=$_GET['archive'];
	$cr=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and anneacad=$archive");
	$ar=$archive+1;
	$j=$archive.'-'.$ar;
	echo $j;
}
else
$cr=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins");
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
			background: url("images/79.jpg") left top ;font-family: serif;
		}
		h1{
			color: black;
			margin-left: 40px;
		}
	</style>
	<title>Gestion des inscriptions a l'UIN</title>
</head>
<body>
	<div class="container-fluid">
		<div>
			<img src="images/ui.jpg" height="110" width="110" class="img-rounded text-left">
			<a href="archive.php" class='pull-right'><button style="background-color: black; margin-top:30px; width:250px; height:40px;border-radius:50px" class="btn btn-primary"><i class="glyphicon glyphicon-book"></i></i>&nbsp; Archives(Annee-Academique)</button></a>
			<a href="statistiques.php"><button style="background-color: black; margin-top:30px; width:250px; height:40px;border-radius: 50px" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-book"></i></i>&nbsp; Statistiques</button></a><br>
		</div><br>
		<div class="text-center">
			<img src="images/17.jpg" height="150" width="50%" class="img-circle"><br><br><br>
		</div>
		<div class="row-fluid">
			<ul class="nav nav-tabs nav-fill">
				<li class="active"><a href="acceuil.php"><span class="glyphicon glyphicon-home"></span>&nbsp;<b> Acceuil</b></a></li>
				<li class="active"><a href="inscrireetud.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;<b>Inscription</b></a></li>
				<li class="active"><a href="etudiants.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>Non-Inscrits</b></a></li>
				<li class="active"><a href="inscrits.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>Inscrits</b></a></li>
<!--Sous-menu deroulable "Departements"-->
				<li class="active">
					<a href="fac.php">
						<span class="glyphicon glyphicon-education"></span>&nbsp;<b>Facultes</b>
					</a>	
				</li>
				<li class="dropdown active">
					<a href="dropdown" class="btn dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
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
				<li class="active"><a href="index.php"><span class="glyphicon glyphicon-arrow-down"  style="color: red;"></span>&nbsp;<b style="color: red;">Deconnexion</b></a></li>
				<nav class="navbar navbar-right">
					<form class="navbar-form navbar-right" role="search" method="post">
						<div class="form-group"><input type="search" name="recherche" class="form-control" placeholder="Recherche"></div>
						<button style="width:108px" class="btn btn-success" type="submit" name="envoyer"><i class="glyphicon glyphicon-search"></i>&nbsp;Rechercher</button>
					</form>
				</nav>
			</ul><br>
		</div>
		<div class="<?php if(isset($_GET['archive']) or isset($_POST['recherche'])){ echo '';}else echo 'modal'; ?>" tabindex="-1" id="vers<?php echo $tab['matricule'];?>" role="dialog" aria-labeledby="Reliquat<?php echo $tab['matricule'];?>" aria-hidden="true">
		<?php include_once('body.php'); ?>
	</div>
</body>
</html>