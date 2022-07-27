<?php

include('../include/bdd.php');

$id_user = !empty($_POST['id']) ? $_POST['id'] : NULL;


// if (isset($id_user)) {

//     $sql = "DELETE FROM possede WHERE id_user=?";
//     $stmt= $bdd->prepare($sql);
//     $stmt->execute([$id_user]);
    
    
//     $sql = "DELETE FROM user WHERE id_user=?";
//     $stmt= $bdd->prepare($sql);
//     $stmt->execute([$id_user]);
    
    
// }

echo "on supprime le membre";
