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
    <title>Document</title>
     <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json"></script>


</head>
<body>

     <a href="ajout_produit.php"><button class="btn btn-danger">Nouveau produit</button></a>
     <a href="ajout_Categorie.php"><button class="btn btn-warning">Nouvel Categorie</button></a>
     <a href="ajout_univers.php"><button class="btn btn-success">Nouvel Univers</button></a>
     <a href="ajout_entiter.php"><button class="btn btn-primary">Nouvel entiter</button></a>
     
   
    <table id="example" class="table table-striped" style="width:100%">
    

    
        <thead>
          
            <tr> 
                <th>Reference</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Image_produit</th>
                <th>Prix produit</th>
                <th>Categorie</th>
                <th>Action</th>
            
            </tr>
        </thead>
        <tbody>

        <?php
	    $sql = "SELECT * from produit p,appartenir a,categorie c
        WHERE p.id_produit=a.id_produit
        and a.id_categorie=c.id_categorie";

        // $sql = "SELECT * from produit p, appartenir ap, categorie c
        // WHERE p.id_produit=ap.id_produit
        // AND ap.id_categorie=c.id_categorie
// ";

	    $produit = $bdd->prepare($sql);
	    $produit->execute();



      
	    
    ?> <?php   while ($article=$produit->fetch()) { ?>
            <tr>
               

                <td><?php echo $article['id_produit'] ?></td>
                <td><?php echo $article['nom_produit'] ?></td>
                <td><?php echo $article['description_produit'] ?></td>
                <td><?php echo $article['image_produit'] ?></td>
                <td><?php echo $article['prix_produit'] ?></td>
                <td><?php echo $article['nom_categorie'] ?></td>
                <td><a href="edit.php?=<?php echo $article['id_produit'] ?>" class="edit" data-toggle="modal" id='<?php echo $article['id_produit'] ?>'><i class="material-icons" data-toggle="tooltip"  title="Edit">&#xE254;</i></a>
					<a href="delete.php?<?php echo $article['id_produit'] ?>" class="delete" id='<?php echo $article['id_produit'] ?>'  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
               
            </tr>
            <?php } ?>
        </tbody>
    </table>

 

<script src="../javascript/datatable.js"></script>
</body>
</html>