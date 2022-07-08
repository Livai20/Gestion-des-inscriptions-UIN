<?php require_once('cn.php');
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
			<table style="background-color: whitesmoke;" class="table table-striped table-hover table-bordered table-condensed">
			    	<thead><!--Table head-->
			    		<a href="inscrireetud.php">
			    		<button class="text-left" data-toggle="modal"  id="inscrire" >
			    			<span class="glyphicon glyphicon-plus"></span>&nbsp;Inscrire un Etudiant
			    		</button></a>
						<tr class="nav nav-fill info"><!--tr:table row(ligne)-->
			    		    <th class="text-center">N°</th>
			    		    <th class="text-center">Photo</th><!--th: table row head-->
			    		    <th class="text-center">Matricule</th>
			    		    <th class="text-center">Nom</th>
			    		    <th class="text-center">Prenom</th>
			    		    <td class="text-center">1er Versement</td>
			    		    <td class="text-center">2eme Versement</td>
			    		    <td class="text-center">3eme Versement</td>
			    		    <td class="text-center">4eme Versement</td>
			    		    <td class="text-center">5eme Versement</td>
			    		    <td class="text-center">6eme Versement</td>
			    		    <th class="text-center">Total</th>
			    		    <th class="text-center">Reste</th>
			    		    <th class="text-center">Menu</th>
			    		</tr>
			    	</thead>
			    	<tbody>
			    		<?php $a=0;
			    		if ($cr->rowCount() > 0) {
			    			while($tab=$cr->fetch()) { ?>
			    		<?php $T=0;	$T=$tab['montant']+$tab['montant2']+$tab['montant3']+$tab['montant4']+$tab['montant5']+$tab['montant6'];
			    			  $R=0; $R=$tab['fraisformation'] - $T; 
			    		?>
			    		<?php 
			    		<tr class="nav nav-fill">
			    			<td class="text-left"><?php echo $a+=1;?></td>
			    			<td class="text-center"> <img src="images/<?php echo $tab['Photo'];?>" height="100" width="90" class="img-rounded"></td>
			    			<td class="text-center">
			    				<?php echo $tab['matricule'];?>		
			    			</td><!--td: table row column-->
			    			<td class="text-center">
			    				<?php echo $tab['nom'];?>
			    			</td>
			    			<td class="text-center">
			    				<?php echo $tab['prenom'];?></td>
			    			<td class="text-center">
			    				<?php echo $tab['montant'] ?>&nbsp;<?php if ($tab['montant'] !=0){ echo 'FCFA' ;}?>
			    			<td class="text-center">
			    				<?php echo $tab['montant2'] ?>&nbsp;<?php if ($tab['montant2'] !=0){ echo 'FCFA' ;}?>
			    			</td>
			    			<td class="text-center">
			    				<?php echo $tab['montant3'] ?>&nbsp;<?php if ($tab['montant3'] !=0){ echo 'FCFA' ;}?>
		    				</td>
		    				<td class="text-center">
		    					<?php echo $tab['montant4'] ?>&nbsp;<?php if ($tab['montant4'] !=0){ echo 'FCFA' ;}?>
		    				</td>
		    				<td class="text-center">
		    					<?php echo $tab['montant5'] ?>&nbsp;<?php if ($tab['montant5'] !=0){ echo 'FCFA' ;}?>
		    				</td>
		    				<td class="text-center">
		    					<?php echo $tab['montant6'] ?>&nbsp;<?php if ($tab['montant6'] !=0){ echo 'FCFA' ;}?>
		    				</td>
		    				<td class="text-center">
		    					<?php echo $T ?>&nbsp;<?php if ($T !=0){ echo 'FCFA' ;}?>
		    				</td>
			    			<td class="text-center">
			    				<?php echo $R ?>&nbsp;<?php if ($R !=0){ echo 'FCFA' ;}?>
			    			</td>
			    			<?php if ($R>0) {  ?>
										<br><button class="btn btn-primary" data-target="#vers<?php echo $tab['idins'];?>" data-toggle='modal'><i class="glyphicon glyphicon-arrow-down"></i>&nbsp;Verser&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
									<?php } ?>

								<div class="modal" tabindex="-1" id="vers<?php echo $tab['idins'];?>" role="dialog" aria-labeledby="Reliquat<?php echo $tab['idins'];?>" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content modal-md">
											<div class="modal-header">Versement de <?php echo $tab['nom'].'&nbsp;'.$tab['prenom'];?> pour l'annee academique
												<button class="close" type="button" data-dismiss="modal" area-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<table class="table table-striped table-hover table-bordered">
													<tr><td class="text-left">Nom de l'etudiant:</td><td class="text-left"><?php echo $tab['prenom'];?></td></tr>
												</table>
												
												<form method="POST" action="operation.php?mat=<?php echo $tab['idins'];?>">
													<?php if ($R>0) {  ?>
													<input type="hidden" name="niveau" value="<?php echo $tab['idniv'];?>" class="form-control">
													<input type="number" name="verser" class="form-control" placeholder="Ajouter un versement"><br>
													<button type="submit" value="vers" name="vers" class="btn btn-success btn-block"><b class="glyphicon glyphicon-arrow-down">&nbsp;Ajouter</b></button><br>
													<?php } ?>
													<li class="dropdown">
													<a href="dropdown" class="btn dropdown-toggle" data-toggle="dropdown">
														<span class="glyphicon glyphicon-edit"></span>&nbsp;<b>Modifier un versement</b>
														<span class="caret"></span>
													</a>
													<ul class="btn dropdown-menu" role="dropdown">
													1er Versement&nbsp;<input type="number" name="montant" class="form-control" value="<?php echo $tab['montant'] ?>"><br>
													2e Versement&nbsp;<input type="number" name="montant2" class="form-control" value="<?php echo $tab['montant2'] ?>"><br>
													3e Versement&nbsp;<input type="number" name="montant3" class="form-control" value="<?php echo $tab['montant3'] ?>"><br>
													4e Versement&nbsp;<input type="number" name="montant4" class="form-control" value="<?php echo $tab['montant4'] ?>"><br>
													5e Versement&nbsp;<input type="number" name="montant5" class="form-control" value="<?php echo $tab['montant5'] ?>"><br>
													6e Versement&nbsp;<input type="number" name="montant6" class="form-control" value="<?php echo $tab['montant6'] ?>"><br>
													<br><button type="submit" name="enregistrer" value="edit" class="btn btn-primary btn-block"><b class="glyphicon glyphicon-save">&nbsp;Modifier</b></button><br>
												</form>
											</ul></li>
											</div>
										</div>
									</div>
								</div>
							</td><?php } 
			    	}else{ ?> <p class="alert alert-warning text-center" style="background-color: black; border-radius: 100px"><b class="btn btn-warning btn-block">Aucun resultat trouve</b></p> 
					<?php } ?></tr>
			    	</tbody>
			    </table>

	</div>
</body>
</html>