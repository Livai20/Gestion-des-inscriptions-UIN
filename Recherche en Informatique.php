<?php
require_once('cn.php');
include_once('date1.php');
$cr=$cn->query("SELECT * from etudiant,filiere,niveau,versement,faculte,departement,inscrire  WHERE versement.niveau=inscrire.idniv and filiere.iddept=departement.iddept and departement.idfac=faculte.idfac and filiere.idfil=niveau.idfil and inscrire.matricule=versement.matricule and niveau.niveau=versement.niveau and etudiant.ide=inscrire.ide and inscrire.idfil=niveau.idfil and inscrire.idins=versement.idins and niveau.niveau='6' and inscrire.idfil='4' and anneacad=$a");
$d1=$cn->query("SELECT * from inscrire where idins=(select max(idins) from inscrire)");
$ta=$d1->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style>
		body{
			background-color: white;font-family: cursive;
		}
		h1{
			color: maroon;
			margin-left: 40px;
		}
	</style>
</head>
<body>
	<?php include_once('header.php'); ?>
<!--Background-color(bleue-marine) sur les 9 premieres colonnes-->
			<div class="row" style="background-color: transparent; box-shadow:inset -1px 1px 7px #444;"><br>
				<div class="text-center">
<!--Couleur d'arriere plan sous 'Enregistrements'-->
					<div class="btn btn-dark btn-block" style="background-color: lightgreen;">&nbsp;<b><h3>FACULTE DES SCIENCES ET TECHNIQUES</b></h3><i><h5><b>ANNEE UNVERSITAIRE: <?php echo $c; ?></b></h5></i><h4><b>LES ETUDIANTS INSCRITS A L'OPTION RECHERCHE EN INFORMATIQUE</b></h4></div><br>	
					<a href="etudiants.php">
			    		<button class="text-left" data-toggle="modal"  id="inscrire" >
			    			<span class="glyphicon glyphicon-plus"></span>&nbsp;Inscrire un Etudiant
			    		</button></a>
				</div>
			
<!--Creation des tables d'affichage des enregistrements-->
					<?php include_once('body.php'); ?>
			</div>		
			</div>
			</div>
		</div>
	</div>
</body>
</html>
