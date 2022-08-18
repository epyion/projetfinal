<?php
session_start();


include '../include/bdd.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    if (isset($_GET['id_produit'])) {

$sql = "DELETE FROM appartenir WHERE id_produit=:id_produit";
$requete = $bdd->prepare($sql);
$result = $requete->execute(array(
    ':id_produit' => $_GET['id_produit']
));

$sql = "DELETE FROM produit WHERE id_produit=:id_produit";
$requete = $bdd->prepare($sql);
$result = $requete->execute(array(
    ':id_produit' => $_GET['id_produit']
));

header('location:crud_produit.php');

}else {}

?>
    
</body>
</html>