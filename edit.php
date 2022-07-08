<?php
require_once('cn.php');
if (isset($_GET['ide'])) {
	$ide=$_GET['ide'];
	$cr=$cn->query("SELECT * FROM etudiant WHERE ide='$ide'");
	$tab=$cr->fetch();
	$cr3=$cn->query("SELECT * FROM inscrire where inscrire.ide='$ide' ");
	$c=$cr3->fetch();
	$cr2=$cn->query("SELECT * FROM filiere");
	$cr1=$cn->query("SELECT * FROM inscrire,filiere where inscrire.idfil=filiere.idfil and ide='$ide' ");
	$a=$cr1->fetch();
}
elseif (isset($_GET['idee'])) {
	$ide=htmlspecialchars($_GET['idee']);
	$err=(int)$ide;
	$cr=$cn->query("SELECT * FROM etudiant WHERE ide='$err'");
	$tab=$cr->fetch();
	$cr3=$cn->query("SELECT * FROM inscrire where inscrire.ide='$err' ");
	$c=$cr3->fetch();
	$cr2=$cn->query("SELECT * FROM filiere");
	$cr1=$cn->query("SELECT * FROM inscrire,filiere where inscrire.idfil=filiere.idfil and ide='$err' ");
	$a=$cr1->fetch();
}
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
		<div class="col-md-offset-2 col-md-8">
			<?php
					if (isset($_GET['idee'])) 
					{
						$ide=htmlspecialchars($_GET['idee']);
						$err=$ide[9].$ide[10].$ide[11].$ide[12].$ide[13].$ide[14].$ide[15];
						switch ($err) {
							case 'niveau5':	
								?>
								<div class="alert alert-danger" style="background-color: navajowhite;">
									<strong class="text-center"><h4 class="glyphicon glyphicon-alert">&nbsp;Erreur!!! Niveau Indisponible pour cette filiere.
									Il n y a que le niveau 5 pour cette filiere( 5e annee) REESSAYER!</h4></strong>
								</div><br><br>
								<?php
								break;
							case 'niveau6':	
								?>
								<div class="alert alert-danger" style="background-color: navajowhite;">
									<strong class="text-center"><h4 class="glyphicon glyphicon-alert">&nbsp;Erreur!!! Niveau Indisponible pour cette filiere.
									Il n y a que le niveau 6 pour cette filiere( 6e annee) REESSAYER!</h4></strong>
								</div><br><br>
								<?php
								break;
							case 'niveau4':	
								?>
								<div class="alert alert-danger" style="background-color: navajowhite;">
									<strong class="text-center"><h4 class="glyphicon glyphicon-alert">&nbsp;Erreur!!! Niveau Indisponible pour cette filiere.
									C'est une filiere du 1er cycle( 1ere-4eme annee) Veuillez choisir un niveau valide!</h4></strong>
								</div><br><br>
								<?php
								break;
						}
					}
				 ?>
			</div>
			<div class="col-md-3">
			</div>
<!--Background-color(bleue-marine) sur les 4 premieres colonnes-->
			<div class="col-md-6" style="background-image: url('images/62.png') ;border-radius: 30px; box-shadow:inset -1px 1px 7px #444;"><br>
				<form role="form" method="post" action="operation.php?ide=$tab['ide'];?>">
					<div class="text-center">
<!--Background-color sur "Inscription-->
						<div class="btn btn-block text-dark" style="background-color: lavender;"><h2><i>MODIFICATION</i></h2></div>
					</div><br>
					<input type="hidden" name="idins" class="form-control"  value="<?php echo $c['idins']?>">
					<input type="hidden" name="ide" class="form-control"  value="<?php echo $tab['ide']?>">
					 Matricule
					<input type="text" name="matricule" class="form-control"  placeholder="Saisir le matricule" required="true" value="<?php echo $tab['matricule']?>"><br>
					Nom
					<input type="text" name="nom" class="form-control"  placeholder="Saisir le nom" required="true" value="<?php echo $tab['nom']?>"><br>
					Prenom
					<input type="text" name="prenom" class="form-control" placeholder="Saisir le prenom" required="true" value="<?php echo $tab['prenom']?>"><br>
					Date de naissance
					<input type="date" name="datenaiss" class="form-control" placeholder="Saisir la date de naissance" required="true" value="<?php echo $tab['datenaiss']?>"><br>
					Lieu de naissance
					<input type="text" name="lieunaiss" class="form-control" placeholder="Saisir le lieu de naissance" required="true" value="<?php echo $tab['lieunaiss']?>"><br>
					<b class="btn btn-info">Nationnalite</b><select name="nationalite" required>
						<option selected value="<?php echo $tab['nationalite']?>"><?php echo $tab['nationalite']?></option>
						<option value='Nigerienne'>Nigerienne</option>
						<option value='Togolaise'>Togolaise</option>
						<option value='Nigeriane'>Nigeriane</option>
						<option value='Beninoise'>Beninoise</option>
						<option value='Burkinabee'>Burkinabee</option>
						<option value='Tchadienne'>Tchadienne</option>
						<option value='Algerienne'>Algerienne</option>
						<option value='Camerounaise'>Camerounaise</option>
						<option value='Libyenne'>Libyenne</option>
						<option value='Americaine'>Americaine</option>
						<option value='Malienne'>Malienne</option>
						<option value='Senegalaise'>Senegalaise</option>
						<option value='Ivoirienne'>Ivoirienne</option>
					</select>
					<br>
					<br><b class="btn btn-info"> Genre: <b class="glyphicon glyphicon-hand-right"></b></b>
					<b class="text-primary " style="color: blue; background-color:white"> Masculin </b><input type="radio" name="genre" required="true" value="M">
					<b class="text-primary" style="color: deeppink; background-color:white"> Feminin </b><input type="radio" name="genre" required="true" value="F"><br>
					<br><p><strong><i class="btn" style="color:white; background-color:black; border-radius:10PX"><h4 class="">Photo du candidat</h4></i></strong></p>
					<img src="images/<?php echo $tab['Photo']?>" width='60' height='60' class='img-rounded'><input type="file" name="photo" class="form-control"  value="<?php echo $tab['Photo']?>"><br>
					<b class="btn btn-info">Filiere</b><select name="filiere">
						<option value="<?php echo $a['idfil'] ?>"><?php echo $a['filiere'] ?>
						</option>
						<?php while($b=$cr2->fetch()) { ?>
							<option value="<?php echo $b['idfil'] ?>"><?php echo $b['filiere']; ?></option>
						<?php } ?>
					</select><br>
					<br><input type="number" name="niveau" class="form-control" min="1" max="7" value="<?php echo $c['idniv']; ?>" placeholder="Saisir le niveau" required="true"><br>
					<br><button type="submit" name="enregistrer" value="modifier" class="btn btn-primary btn-block"><b class="glyphicon glyphicon-save">&nbsp;Modifier</b></button><br>
				</form>
		</div>
	</div>
</body>
</html>