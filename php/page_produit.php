<?php
session_start();
                     
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>

<?php   

include '../include/nav-bar.php';

$sql = "SELECT * FROM produit WHERE id_produit=".$_GET['id_produit']."";
                                    $requete = $bdd ->prepare($sql);
                                    $requete ->execute(); 
                                    $row =$requete->fetch();

?>

<div class="produit">
<div class="imgproduit">
<img src="../img/produit/<?= $row['image_produit'] ?>" width="600px" height="600px" >
</div>
<div class="infoproduit">
    <div class="nomproduit"><?= $row['nom_produit'] ?></div>
    <div class="descriptionproduit"><?= $row['description_produit'] ?></div>
    <div class="prixproduit"><?= $row['prix_produit'] ?></div>
    <button type="button" class="btn btn-primary">Ajouter au panier</button>
</div>
</div>

     <
</body>
</html>

