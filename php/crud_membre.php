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
     
<?php include '../include/nav-bar.php' ?>
   
    <table id="example" class="table table-striped" style="width:100%">
    

    
        <thead>
          
            <tr> 
                
                <th>Nom</th>
                <th>prenom</th>
                <th>pseudo</th>
                <th>email</th>
                <th>date de naissance</th>
                <th>addresse</th>
                <th>ville</th>
                <th>code postal</th>
                <th>date d'inscription</th>
            
            </tr>
        </thead>
        <tbody>

        <?php
        $sql = "SELECT * from user u, role r, possede p
        WHERE u.id_user=p.id_user
        and p.id_role=r.id_role";
        $requete = $bdd->prepare($sql);
        $requete->execute();
    
	    
    ?> <?php   while ($membre=$requete->fetch()) { ?>
            <tr>
               

                <td><?php echo $membre['nom_user'] ?></td>
                <td><?php echo $membre['prenom_user'] ?></td>
                <td><?php echo $membre['pseudo_user'] ?></td>
                <td><?php echo $membre['email_user'] ?></td>
                <td><?php echo $membre['ddn_user'] ?></td>
                <td><?php echo $membre['addresse_user'] ?></td>
                <td><?php echo $membre['ville_user'] ?></td>
                <td><?php echo $membre['cp_user'] ?></td>
                <td><?php echo $membre['ddi_user'] ?></td>
                <td><a href="edit.php?id_produit=<?php echo $membre['id_user'] ?>" class="edit" data-toggle="modal" id='<?php echo $membre['id_user'] ?>'><i class="material-icons" data-toggle="tooltip"  title="Edit">&#xE254;</i></a>
					<a href="delete.php?id_produit=<?php echo $membre['id_user'] ?>" class="delete" id='<?php echo $membre['id_user'] ?>'  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
               
            </tr>
            <?php } ?>
        </tbody>
    </table>

 

<script src="../javascript/datatable.js"></script>
</body>
</html>