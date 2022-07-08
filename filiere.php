<?php 
	while($tabD=$d->fetch()){?>	
		<div class="col-xs-4"><label for="card" class="form-label"></label>
			<img class="card-img-top" width="250px" height="210px" src="images/<?php echo $tabD['photo']; ?>" alt="card image cap">
			<div class="card-body">
				<h5 class="card-title"><b class="btn btn-success">OPTION: <?php echo $tabD['filiere']; ?></b></h5>
				<a href="<?php echo $tabD['filiere']; ?>.php" id='card' class="btn btn-primary">Aller vers <?php echo $tabD['filiere']; ?></a><br><br>
			</div>
		</div>
<?php }?>