<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="col-md-6" style="background-color: rgba(50,0,0,1); margin-left: 300px;margin-top: 170px;color: white">
			<h1 class="text-center">Bonjour</h1>
		</div>
		<table class="table table-bordered table-striped">
			<thead>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Date de naissance</th>
				<th>Lieu de naissance</th>
				<th>Menu</th>
			</thead>
			<tbody>
				<td>Djinaidou</td>
				<td>Abdourahamane</td>
				<td>26/01/2002</td>
				<td>Madaoua</td>
				<td>
					<button class="glyphicon glyphicon-envelope btn btn-success" data-target="#aa" data-toggle="modal"></button>
					<button class="glyphicon glyphicon-trash btn btn-danger"></button>
				</td>
			</tbody>
		</table>
		<div class="modal" tabindex="-1" id="aa" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content modal-md">
					<div class="modal-header">Details
						<button class="close" type="button" data-dismiss="modal" area-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<table class="table table-bordered">
							<thead>
								<th>Faculte</th>
								<th>Filiere</th>
								<th>Section</th>
								<th>Genre</th>
								<th>Annee-Scolaire</th>
							</thead>
							<tbody>
								<td>FAST</td>
								<td>Informatique</td>
								<td>2e Annee</td>
								<td>M</td>
								<td>2021-2022</td>
							</tbody>
						</table>						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
