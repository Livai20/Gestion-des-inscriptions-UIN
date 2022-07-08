<table style="background-color: whitesmoke;" class="table table-striped table-hover table-bordered table-condensed">
			    	<thead><!--Table head-->
			    		<a href="inscrireetud.php">
			    		<button class="text-left" data-toggle="modal"  id="inscrire" >
			    			<span class="glyphicon glyphicon-plus"></span>&nbsp;Enregistrer un Etudiant
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
			    	<tbody><!--table body-->
			    		<?php $a=0;
			    		if ($cr->rowCount() > 0) {
			    			while($tab=$cr->fetch()) { ?>
			    		<?php $T=0;	$T=$tab['montant']+$tab['montant2']+$tab['montant3']+$tab['montant4']+$tab['montant5']+$tab['montant6'];
			    			  $R=0; $R=$tab['fraisformation'] - $T; 
			    		?>
			    		<tr class="nav nav-fill">
			    			<td><?php echo $a+=1;?></td>
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
			    			<td class="text-center">
			    				<button class="btn btn-info text-center" data-target="#details<?php echo $tab['idins'];?>" data-toggle="modal">
			    					<i class="glyphicon glyphicon-list"></i>&nbsp;Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    				</button>

			      	<!--Debut de la page modale des details-->
<!--data target # du boutton renvoit au id de la page modale qui sera ensuite executee-->
			    				<div class="modal" tabindex="-1" id="details<?php echo $tab['idins'];?>" role="dialog" aria-labeledby="details<?php echo $tab['matricule'];?>" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content modal-md">
											<div class="modal-header">Details de <?php echo $tab['nom'].'&nbsp;'.$tab['prenom'];?>
												<button class="close" type="button" data-dismiss="modal" area-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<table class="table table-striped table-hover table-bordered">
													<tr><td class="text-left">Matricule</td><td class="text-left"><?php echo $tab['matricule'];?></td></tr>
													<tr><td class="text-left">Nom</td><td class="text-left"><?php echo $tab['nom'];?></td></tr>
													<tr><td class="text-left">Prenom</td><td class="text-left"><?php echo $tab['prenom'];?></td></tr>
													<tr><td class="text-left">Date de Naissance</td><td class="text-left"><?php echo $tab['datenaiss'];?></td></tr>
													<tr><td class="text-left">Lieu de Naissance</td><td class="text-left"><?php echo $tab['lieunaiss'];?></td></tr>
													<tr><td class="text-left">Genre</td><td class="text-left"><?php echo $tab['genre'];?></td></tr>
													<tr><td class="text-left">Nationalite</td><td class="text-left"><?php echo $tab['nationalite'];?></td></tr>
													<tr><td class="text-left">Faculte</td><td class="text-left"><?php echo $tab['faculte'];?></td></tr>
													<tr><td class="text-left">Filiere</td><td class="text-left"><?php echo $tab['filiere'];?></td></tr>
													<tr><td class="text-left">Niveau</td><td class="text-left"><?php echo $tab['niveau'];?></td></tr>
												</table>
												<a href="edit.php?ide=<?php echo $tab['ide'];?>"><br>
							    					<button class="btn btn-primary">
							    						<i class="glyphicon glyphicon-edit"></i>&nbsp;Modifier
							    					</button>
							    				</a>
							    				<a href="delete.php?matricule=<?php echo $tab['matricule'];?>">
							    					<button class="btn btn-danger">
							    						<i class="glyphicon glyphicon-trash"></i>&nbsp;Supprimer
							    					</button>
							    				</a>
							    				<?php if ($R<=0) { ?>
							    				<button data-target="#vers<?php echo $tab['idins'];?>" data-toggle="modal" class="btn btn-warning">Gerer les versements passes</button>
							    			<?php } ?>
							    			</div>
										</div>
									</div>
								</div><br>
								<?php if ($R<=0) { ?>
								<a href="confirmer.php?matricule=<?= $tab['idins'] ;?>"><button class="btn btn-success" >
									<i class="glyphicon glyphicon-plus"></i>&nbsp;Reinscrire
								</button></a>
							<?php } ?>
								<div class="modal" tabindex="-1" id="Reinscrire<?php echo $tab['idins'];?>" role="dialog" aria-labeledby="Reinscrire<?php echo $tab['idins'];?>" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content modal-md">
											<div class="modal-header">Reinscription de <?php echo $tab['nom'].'&nbsp;'.$tab['prenom'];?> pour l'annee academique <?php echo $tab['anneacad'];?>
												<button class="close" type="button" data-dismiss="modal" area-hidden="true">&times;</button>
											
											</div>
											<div class="modal-body">
				
												<?= 'filiere '; echo $tab['idfil'];echo '-'; echo $tab['filiere'] ?>
												<?= 'niveau'; echo $tab['idniv']; ?>
												<?php 
												if ($tab['idfil'] =4) { ?>
													<p><h4 style="background-color: black;color: white;" class="btn btn-block">Reinscrire en <?php echo $tab['idniv'];?> eme annee en <?php echo $tab['filiere'];?></h4></p>
													<?php }
												elseif ($tab['idfil']='1' or $tab['idfil']='6' or $tab['idfil']='8' or $tab['idfil']='9' or $tab['idfil']='10' or $tab['idfil']='11' or $tab['idfil']='12' or $tab['idfil']='15' or $tab['idfil']='16' or $tab['idfil']='17') { 
													if ($tab['idniv']='4') { ?>
														<p><h4 style="background-color: black;color: white;" class="btn btn-block">Reinscrire en <?php echo $tab['idniv'];?> eme annee en <?php echo $tab['filiere'];?></h4></p>
														<?php }
													else { ?>
														<p><h4 style="background-color: black;color: white;" class="btn btn-block">Inscrire en annee suivante: <?php echo $tab['idniv']+1;?> eme annee en <?php echo $tab['filiere'];?></h4></p>
														<form method="POST" action="operation.php"> 
															<input type="text" name="ide" class="form-control" value="<?php echo $tab['ide'];?>">
															<input type="text" name="matricule" class="form-control" value="<?php echo $tab['matricule'];?>">
															<input type="text" name="niveau" class="form-control" max="6" class="form-control" value="<?php echo $tab['idniv']+1;?>">
															<input type="text" name="filiere" class="form-control" value="<?php echo $tab['idfil'];?>">
															<input type="number" name="montant" class="form-control" placeholder="Le montant du premier versement">
															<button type="submit" value="annee" name='suivante' class="btn btn-success btn-block"><b class="glyphicon glyphicon-arrow-down">&nbsp;Ajouter</b></button><br>
														</form>
													<?php } }
												elseif ($tab['idfil']='2' or $tab['idfil']='5' or $tab['idfil']='3' or $tab['idfil']='7' or $tab['idfil']='13' or $tab['idfil']='14') {
												 	?>
												 	<p><h4 style="background-color: black;color: white;" class="btn btn-block">Reinscrire en <?php echo $tab['idniv'];?> eme annee en <?php echo $tab['filiere'];?></h4></p>
													<?php } ?>
												<p><h4 style="background-color: black;color: white;" class="btn btn-block">Ou Inscrire a une autre filiere ?</h4></p>
												<a href="confirmer.php?matricule=<?= $tab['matricule'] ;?>"><button class="btn btn-primary">Oui</button></a>
												<a href="acceuil.php"><button class="btn btn-danger">Annuler</button></a>
											</div>
										</div>
									</div>
								</div>
										<?php if ($R>0) {  ?>
										<br><button class="btn btn-primary" data-target='#vers<?php echo $tab['idins'];?>' data-toggle='modal'><i class="glyphicon glyphicon-arrow-down"></i>&nbsp;Verser&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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