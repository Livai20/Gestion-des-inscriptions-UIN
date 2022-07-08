<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stock</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style>
		body{
			background: url("images/28.jpg") left top fixed;
		}
		h1{
			color: maroon;
			margin-left: 40px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4" style="margin-top: 150px; background-color: darkblue;">
				<form method="POST" action="connecter.php" >
					<br><input type="text" name="compte" class="form-control" placeholder="Entrez le compte utilisateur" ><br>
					<input type="password" name="motpasse" class="form-control" placeholder="Entrez le mot de passe" ><br>
					<button name="connecter" value="connecter" class="btn btn-success btn-block"><i class="glyphicon glyphicon-log-in">&nbsp;</i>Connexion</button><br>
				</form>
			</div>
		</div>
	</div>
</body>
</html>