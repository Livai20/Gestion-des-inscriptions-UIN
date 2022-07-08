<?php
require_once('cn.php');
$cr=$cn->query("SELECT * FROM etudiant WHERE matricule is null ");
if(isset($_POST['recherche']) and !empty($_POST['recherche'])){
	$rech=htmlspecialchars($_POST["recherche"]);
	$cr=$cn->query('SELECT * from etudiant WHERE matricule is null and nom like "%'.$rech.'%" order by nom asc');
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style>
		body{
			font-family: cursive;		}
		h1{
			color: maroon;
			margin-left: 40px;
		}
	</style>
</head>
<body>
	<?php include_once('header.php'); ?>
				<nav class="navbar navbar-right">
					<form class="navbar-form navbar-right" role="search" method="post">
						<div class="form-group"><input type="search" name="recherche" class="form-control" placeholder="Recherche"></div>
						<button class="btn btn-success" type="submit" name="envoyer"><i class="glyphicon glyphicon-search"></i>&nbsp;Rechercher</button>
					</form>
				</nav>
			</ul><br>
		</div>
<!--Background-color(bleue-marine) sur les 9 premieres colonnes-->
			<div class="row" style="background-color: transparent; box-shadow:inset -1px 1px 7px #444;"><br>
				<div class="text-center">
<!--Couleur d'arriere plan sous 'Enregistrements'-->
					<div class="btn btn-dark" style="background-color: darkblue;">&nbsp;<p class="btn btn-success">Les candidats non-inscrits a l'UIN</p></div><br>
					<a href="inscrireetud.php">
			    		<button class="text-center" data-toggle="modal"  id="inscrire">
			    			<span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter
			    		</button></a>
				</div>
			
<!--Creation des tables d'affichage des enregistrements-->
						<table class="table table-hover table-bordered"> <!table-condensed>
			    	<thead><!--Table head-->
						<tr class="nav nav-fill info"><!--tr:table row(ligne)-->
							<th class="text-center">N°</th>
			    		    <th class="text-center">Photo</th>
			    		    <th class="text-center">Nom</th>
			    		    <th class="text-center">Prenom</th>
			    		    <th class="text-center">Date-Naissance</th>	
			    		    <th class="text-center">Lieu-Naissance</th>
			    		    <th class="text-center">Nationnalite</th>
			    		    <th class="text-center">Genre</th>
			    		    <th class="text-center">Menu</th>
			    		</tr>
			    	</thead>
			    	<tbody><!--table body-->
			    		<?php $a=0;
			    			if ($cr->rowCount() > 0) {
			    			while($tab=$cr->fetch()) { ?>
			    		<tr class="nav nav-fill">
			    			<td><?php echo $a+=1;?></td>
			    			<td class="text-center"> <img src="images/<?php echo $tab['Photo'];?>" height="90" width="90" class="img-rounded"></td>
			    			<td class="text-center"><?php echo $tab['nom'];?></td>
			    			<td class="text-center"><?php echo $tab['prenom'];?></td>
			    			<td class="text-center"><?php echo $tab['datenaiss'];?></td>
			    			<td class="text-center"><?php echo $tab['lieunaiss'];?></td>
			    			<td class="text-center"><?php echo $tab['nationalite'];?></td>
			    			<td class="text-center"><?php echo $tab['genre'];?></td>
			    			<td class="text-center">
			    				<a href="confirmer.php?non=<?= $tab['ide'];?>"><button class="btn btn-success"> <i
			    		class="glyphicon
			    		glyphicon-pencil"></i></i>&nbsp;Inscrire </button></a><br>
			    				<button class="btn btn-info" data-target="#details<?php echo $tab['matricule'];?>" data-toggle="modal"> <i
			    		class="glyphicon
			    		glyphicon-list"></i></i>&nbsp;Details. </button>

			      	<!--Debut de la page modale des details-->
<!--data target # du boutton renvoit au id de la page modale qui sera ensuite executee-->
			    				<div class="modal" tabindex="-1" id="details<?php echo $tab['matricule'];?>" role="dialog" aria-labeledby="details<?php echo $tab['matricule'];?>" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content modal-md">
											<div class="modal-header">Details de <?php echo $tab['nom'].'&nbsp;'.$tab['prenom'];?>
												<button class="close" type="button" data-dismiss="modal" area-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<table class="table table-striped table-hover table-bordered">
													<tr><td class="text-left">Nom</td><td class="text-left"><?php echo $tab['nom'];?></td></tr>
													<tr><td class="text-left">Prenom</td><td class="text-left"><?php echo $tab['prenom'];?></td></tr>
													<tr><td class="text-left">Date de Naissance</td><td class="text-left"><?php echo $tab['datenaiss'];?></td></tr>
													<tr><td class="text-left">Lieu de Naissance</td><td class="text-left"><?php echo $tab['lieunaiss'];?></td></tr>
													<tr><td class="text-left">Genre:</td><td class="text-left"><?php echo $tab['genre'];?></td></tr>
													<tr><td class="text-left">Nationalite</td><td class="text-left"><?php echo $tab['nationalite'];?></td></tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</td>
			    		<?php } 
			    	}else{ ?> <p class="alert text-center"><b class="btn btn-warning btn-block">Aucun etudiant trouve</b></p> 
					<?php } ?>

			    	</tr>
			    	</tbody>
			    </table>
			</div>		
			   </div>
			</div>
		</div>
	</div>

</body>
</html>
