<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<style type="text/css">
		body{font-family: cursive;}
	</style>
</head>
<body>
	<div class="container"><br><br><br><br><br><br><br><br>
		<div class="col-md-offset-2 col-md-7">
			<div class="alert alert-danger text-center" role="alert" style="border-radius: 50px;">
				<a href="acceuil.php">
					<button class="close" type="button" area-hidden="true">&times;</button>
				</a>
				<h1 class="alert-heading" style="color: black;">On ne peut pas supprimer des donnees de la base pour des raisons de securite!</h1>	
				<p>
					<h4 class="text-center" style="color:red;">Operation echouee!</h4>
				</p><br>
				<a href="inscrits.php">
					<button class="mb-0">OK</button>
				</a>
			</div>	
		</div>
	</div>
</body>
</html>