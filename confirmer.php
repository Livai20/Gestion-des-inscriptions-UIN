<?php
	require_once('cn.php');
	if (isset($_GET['oui'])) {
	$cr=$cn->query("SELECT * FROM etudiant where etudiant.ide=(select max(ide) from etudiant)");
	$tab=$cr->fetch();
	$cr2=$cn->query("SELECT * from inscrire where idins=(select max(idins) from inscrire)");
	$b=$cr2->fetch();
	}
	elseif (isset($_GET['non'])) {
		$non=$_GET['non'];
		$cr=$cn->query("SELECT * FROM etudiant where etudiant.ide=$non");
		$tab=$cr->fetch();
		$cr2=$cn->query("SELECT * from inscrire where idins=(select max(idins) from inscrire)");
		$b=$cr2->fetch();
	}
	elseif (isset($_GET['matricule'])) {
		$matricule=$_GET['matricule'];
		$cr=$cn->query("SELECT * FROM inscrire,etudiant where inscrire.idins=$matricule and inscrire.matricule=etudiant.matricule");
		$tab=$cr->fetch();
		$cr1=$cn->query("SELECT * FROM inscrire,filiere where inscrire.idfil=filiere.idfil and idins='$matricule' ");
		$a=$cr1->fetch();
		$cr2=$cn->query("SELECT * from inscrire where idins=(select max(idins) from inscrire)");
		$b=$cr2->fetch();
	}
	elseif (isset($_GET['idee'])) {
		$errr=htmlspecialchars($_GET['idee']);
		$cr=$cn->query("SELECT * FROM etudiant,inscrire WHERE inscrire.ide=$errr and inscrire.matricule=etudiant.matricule");
		$tab=$cr->fetch();
		$cr2=$cn->query("SELECT * FROM inscrire where inscrire.ide='$errr' ");
		$b=$cr2->fetch();
		$cr1=$cn->query("SELECT * FROM inscrire,filiere where inscrire.idfil=filiere.idfil and ide='$errr' ");
		$a=$cr1->fetch();
		}
	$cr1=$cn->query("SELECT * FROM filiere");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style>
		body{
			background: url("images/74.jpg") left top ;font-family: cursive;
		}
		h1{
			color: maroon;
			margin-left: 40px;
		}
	</style>
</head>
<body><br>
	<?php
		if (isset($_GET['error'])){
			$err=htmlspecialchars($_GET['error']);
			switch ($err) {
				case 'niveau5':	?>
					<div class="alert alert-danger" style="background-color: navajowhite;">
						<strong class="text-center"><h4 class="glyphicon glyphicon-alert">&nbsp;Erreur!!! Niveau Indisponible pour cette filiere.
							Il n y a que le niveau 5 pour cette filiere( 5e annee) REESSAYER!</h4></strong>
					</div><br><br>
					<?php
				break;
				case 'niveau6':	?>
					<div class="alert alert-danger" style="background-color: navajowhite;">
						<strong class="text-center"><h4 class="glyphicon glyphicon-alert">&nbsp;Erreur!!! Niveau Indisponible pour cette filiere.
							Il n y a que le niveau 6 pour cette filiere( 6e annee) REESSAYER!</h4></strong>
					</div><br><br>
					<?php
				break;
				case 'niveau4':	?>
					<div class="alert alert-danger" style="background-color: navajowhite;">
						<strong class="text-center"><h4 class="glyphicon glyphicon-alert">&nbsp;Erreur!!! Niveau Indisponible pour cette filiere.
							C'est une filiere du 1er cycle( 1ere-4eme annee) Veuillez choisir un niveau valide!</h4></strong>
					</div><br><br>
					<?php 
				break; 
			}
		}
	?>
<div class="<?php if(isset($_GET['idee'])){ echo 'modal';}else echo '' ;?>" tabindex="-1" id="inscrire<?php echo $tab['ide'];?>" role="dialog" aria-labeledby="inscrire<?php echo $tab['ide'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content modal-md">
			<div class="modal-header"><?php if (isset($_GET['matricule'])) { echo 'Reinscription' ; }else echo "Inscription";?> de <strong style="color:blue;"><?=$tab['nom'].' '.$tab['prenom']; ?></strong>
				<button class="close" type="button" data-dismiss="modal" area-hidden="true">&times;</button>					
			</div>
			<div class="modal-body" style="background-color: black;">
				<form method="POST" action="operation.php"><br>
					<input type="hidden" name="idins" value="<?=$b['idins']+1; ?>" class="form-control">
					<input type="hidden" name="ide" value="<?=$tab['ide']; ?>" class="form-control"  placeholder="Saisir le matricule" required>
					<br><input type="text" name="matricule" value="<?= $tab['matricule'] ?>" class="form-control"  placeholder="Saisir le matricule" required><br>
					<b class="btn btn-info">Option</b>
					<select name="filiere">
						<option value="<?php if(isset($_GET['matricule'])) { echo $a['idfil'];} else echo '';?>"><?php if(isset($_GET['matricule'])) { echo $a['filiere'];} else echo 'Option' ?></option>
						<?php while($tab1=$cr1->fetch()) { ?>
						<option value="<?php echo $tab1['idfil'] ?>"><?php echo $tab1['filiere']; ?></option>
						<?php } ?>
					</select><br>
					<br><input type="number" name="niveau" value="<?php if(isset($_GET['matricule'])) { echo $a['idniv'];}else echo '';?>" class="form-control" min='1' max=6 placeholder="Saisir le niveau" required="true"><br>
					<input type="text" name="montant" class="form-control" placeholder="Saisir le montant verse au premier versement" required="true"><br>
					<br><button  type="submit" name="enregistrer" value="inscrire" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-save">&nbsp;INSCRIRE</i></button>
				</form>
				<br><a href="etudiants	.php"><button class="btn btn-danger btn"><i class="glyphicon glyphicon-trash">&nbsp;ANNULER</i></button></a><br><br>
			</div>
		</div>
	</div>
</div>
</body>
</html>
			