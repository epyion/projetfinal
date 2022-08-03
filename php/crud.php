<?php
session_start();


include '../include/bdd.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}
	</style>
	<script>
		$(document).ready(function() {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function() {
				if (this.checked) {
					checkbox.each(function() {
						this.checked = true;
					});
				} else {
					checkbox.each(function() {
						this.checked = false;
					});
				}
			});
			checkbox.click(function() {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
	<?php
	$sql = "SELECT * from user u, role r, possede p
    WHERE u.id_user=p.id_user
    and p.id_role=r.id_role";
	$requete = $bdd->prepare($sql);
	$requete->execute();

	?>
</head>

<body>

	<div class="container-fluid">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>administration membre</h2>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>

							<th>id</th>
							<th>pseudo</th>
							<th>nom</th>
							<th>prenom</th>
							<th>e-mail</th>
							<th>date de naissance</th>
							<th>adresse</th>
							<th>ville</th>
							<th>code postal</th>
							<th>date d'inscription</th>
							<th>role</th>
							<th>action</th>

						</tr>
					</thead>

						<tbody>

					<?php
					while ($row = $requete->fetch()) {

					?>
							<tr>

								<td><?php echo $row['id_user'] ?></t>
								<td><?php echo $row['pseudo_user'] ?></td>
								<td><?php echo $row['nom_user'] ?></td>
								<td><?php echo $row['prenom_user'] ?></td>
								<td><?php echo $row['email_user'] ?></td>
								<td><?php echo $row['ddn_user'] ?></td>
								<td><?php echo $row['addresse_user'] ?></td>
								<td><?php echo $row['ville_user'] ?></td>
								<td><?php echo $row['cp_user'] ?></td>
								<td><?php echo $row['ddi_user'] ?></td>
								<td><?php echo $row['nom_role'] ?></td>
								<td><a onclick="editemployermodal(event)" href="#editEmployeeModal" class="edit" data-toggle="modal" id='<?php echo $row['id_user'] ?>'><i class="material-icons" data-toggle="tooltip"  title="Edit">&#xE254;</i></a>
									<a onclick="setDeleteId(event)" href="#deleteMembre" class="delete" id='<?php echo $row['id_user'] ?>'  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
								</td>
							</tr>
						</tbody>
					<?php } ?>

				</table>
				<div class="clearfix">
					<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
					<ul class="pagination">
						<li class="page-item disabled"><a href="#">Previous</a></li>
						<li class="page-item"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item active"><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">4</a></li>
						<li class="page-item"><a href="#" class="page-link">5</a></li>
						<li class="page-item"><a href="#" class="page-link">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">


					<?php
			
				// $sql="UPDATE user SET pseudo_user, nom_user, prenom_user, email_user, ddi_user, addresse_user, ville_user, cp_user";
				// $edit= $bdd->prepare($sql);
				// $edit->execute(array(
				// 	'pseudo_user'=> $pseudo,
				// 	'nom_user'=> $nom_user,
				// 	'prenom_user'=> $prenom,
				// 	'email_user'=> $ddi_user,
				// 	'ddi_user'=> $addresse_user,
				// 	'ville_user'=> $cp_user
				// ));
				// if(!empty($_POST['update'])){

					
?>
			<div class="modal-content">
	
				<form id="update">
					<div class="modal-header">
						<h4 class="modal-title">Edit Membre</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>pseudo</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>nom</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>prenom</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>e-mail</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>date de naissance</label>
							<input type="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>addrese</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>ville</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>code postal</label>
							<input typcodee="text" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
		

			</div>
				<?php
		//  } 
		 ?>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteMembre" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="confirmDelete">
					<div class="modal-header">
						<h4 class="modal-title">Delete membre</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Etes vous sur de vouloir supprimer ce membre?</p>
						<p class="text-warning"></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger"  value="supprimer">

					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		$(function() {

			$('form#confirmDelete').on(
				'submit',
				function(e) {
					$.ajax({
						url: '../traitement/delete_membre.php',
						type: 'POST',
						data: {
							id: Id_delete
						},
						success: function(data) {
							$('#deleteMembre').modal('hide');
						}
					});
					
					e.preventDefault();

				});
				
			$('#deleteMembre').on('show.bs.modal', function(event) {

				var button = $(event.relatedTarget)
				var id = button.data('user')

			})


		});

		var Id_delete = -1;

		function setDeleteId(event){
			Id_delete = event.target.parentNode.id;
			console.log(Id_delete)
			Id_delete.style.transition = "opacity 0.2s";
			Id_delete.style.opacity = "0";
		}
		setTimeout(function() {
  		Id_delete.style.display = "none";
		}, 200);

	</script>


</body>

</html>