<?php

include('../include/bdd.php');

$id_user = !empty($_POST['id_user']) ? $_POST['id_user'] : NULL;
if (isset($id_user)){

    $sql = "DELETE FROM user WHERE id_user=?";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$id_user]);


}

 ?>