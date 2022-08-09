<?php
session_start();


include '../include/bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json"></script>
    <title>Document</title>
</head>
<body>

<form method="POST" action="ajout_entiter.php?action=ajout">
					
						<h4 class="modal-title">ajouter une entiter (personnage)</h4>
					<div class="container ">
						<div class="form-group">
							<label>Entiter</label>
							<input type="text" class="form-control"name="nom_entite" required>
						</div>
                        <button type='POST'>ajouter</button>
					</div>
</form>            
    
<?php
                if (isset($_GET['action']))
                {
                    if ($_GET['action'] == 'ajout')
                    {
                        $entiter = $_POST['nom_entite'] ?? null ;


                $sql= "INSERT INTO entite (nom_entite) VALUES (:nom_entite)";
                $add = $bdd->prepare($sql);
                $add->execute(array(
                    ':nom_entite' => $entiter
                ));
                header("location:crud_produit.php");
                    }
                }
               
?>

    
</body>
</html>