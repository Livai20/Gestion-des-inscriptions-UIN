<?php
require_once('cn.php');
$cr=$cn->query("SELECT * FROM filiere,etudiant,niveau");
$tab=$cr->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style type="text/css">
		body{font-family: cursive;}
	</style>
</head>
<body>
	<?php include_once('header.php'); ?>
		<div class="col-md-3"></div>
<!--Background-color(bleue-marine) sur les 4 premieres colonnes-->
			<div class="col-md-6" style="background-image: url('images/79.jpg') ;color: black; border-radius: 30px; box-shadow:inset -1px 1px 7px #444;"><br>
				<form role="form" method="post" action="operation.php">
					<div class="text-center">
<!--Background-color sur "Inscription-->
						<div class="btn btn-block text-dark" style="background-color: lavender;"><h2><i>ENREGISTREMENT</i></h2></div>
					</div><br>
<!--Entree des donnees pour l'enregistrement-->
					<input type="text" name="nom" id="n" class="form-control"  placeholder="Saisir le nom" required="true"><br>
					<input type="text" name="prenom" class="form-control" placeholder="Saisir le prenom" required="true"><br>
					<input type="date" name="datenaiss" class="form-control" placeholder="Saisir la date de naissance" required="true"><br>
					<input type="text" name="lieunaiss" class="form-control" placeholder="Saisir le lieu de naissance" required="true"><br>
					<b class="btn btn-primary">Nationnalite</b><select name="nationalite" required="true">
						<option selected value="" >Nationnalite</option>
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
					<br><b class="btn btn-primary"> Genre: <b class="glyphicon glyphicon-hand-right"></b></b>
					<b class="text-primary " style="color: blue; "> Masculin </b><input type="radio" name="genre" required="true" value="M">
					<b class="text-primary" style="color: deeppink; "> Feminin </b><input type="radio" name="genre" required="true" value="F"><br>
					<br><strong><i class="btn" style="color:white; background-color:dimgray; border-radius:10px"><h5>Photo du candidat</h5></i></strong><br>
					<img src="images/user.jpg" width='60' height='60' class='img-rounded'><input type="file" name="photo" class="form-control"  value="<?php echo $tab['Photo']?>"><br>
					<br><button type="submit" name="enregistrer" value="enregistre" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-save">&nbsp;Enregistrer</i></button><br><br>
				</form>																										
			</div>
		</div>
	</div>
</body>
</html>