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
</head>
<body>
    

<?php

var_dump($_GET['id_produit']);

        // $selectproduit= "SELECT * FROM produit WHERE id_produit=:id_produit";
        // $requeteproduit = $bdd->prepare($selectproduit);
        // $requeteproduit->execute(array(
        // ':id_produit' => $_GET['id_produit']
        // ));
        $id = $_GET['id_produit'];
        $requete = $bdd->prepare("SELECT * FROM produit WHERE id_produit = ?");
        $requete->execute(array($id));
        $result = $requete->fetch();
     





        $sqlcategorie = "SELECT * FROM categorie";
        $requetecategorie = $bdd->prepare($sqlcategorie);
        $requetecategorie->execute();
        $categorie = $bdd->lastInsertId();


		$sqluniver = "SELECT * FROM univer";
        $requeteuniver = $bdd->prepare($sqluniver);
        $requeteuniver->execute();
        $univer = $bdd->lastInsertId();

		$sqlentiter = "SELECT * FROM entite";
        $requeteentiter = $bdd->prepare($sqlentiter);
        $requeteentiter->execute();
        $entiter = $bdd->lastInsertId();

       


?>
<form action="" enctype="multipart/form-data" method="POST">
					
        
        <div class="inscription">
        
            <div class="container  border border-dark formulaire">
                <h4 class="modal-title">mettre a jour article</h4>


						<div class="form-group">
							<label>nom produit</label>
							<input type="text" class="form-control" name ="nom_produit" value="<?php echo $result['nom_produit'] ?>" required>
                         
						</div>
						<div class="form-group">
							<label>descritpion produit</label>
							<textarea type="text" class="form-control" name="description_produit" required><?php echo $result['description_produit'] ?></textarea>
						</div>
						<div class="form-group">
							<label>image produit</label>
							<input type="file" name="file" class="form-control" value="<?php echo $result['image_produit'] ?>"required>
						</div>
						<div class="form-group">
							<label>Prix produit</label>
							<input type="text" class="form-control" name="prix_produit" value="<?php echo $result['prix_produit'] ?>" required>
						</div>

					<div class="cont_categorie">
                        <div class="categorie">changer la categorie :
                            <select name="id_categorie">

                                <?php
                                while ($categorie = $requetecategorie->fetch()) {

                                ?>

                                    <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>

                                <?php
                                }

                                ?>
                            </select>

                        </div>
					</div>
					<div class="cont_univer">
                        <div class="categorie">changer l'univers :
                            <select name="id_univer">

                                <?php
                                while ($univer = $requeteuniver->fetch()) {

                                ?>

                                    <option value="<?= $univer['id_univer'] ?>"><?= $univer['nom_univer'] ?></option>

                                <?php
                                }

                                ?>
                            </select>

                        </div>
					</div>
					<div class="cont_entite">
                        <div class="categorie">changer le personnage :
                            <select name="id_entite">

                                <?php
                                while ($entiter = $requeteentiter->fetch()) {

                                ?>

                                    <option value="<?= $entiter['id_entite'] ?>"><?= $entiter['nom_entite'] ?></option>

                                <?php
                                }

                                ?>
                            </select>

                        </div>
					</div>
						
                        <button type='submit'>Modifier</button>
					</div>
            </div>
        </div>

        <?php
                  
                  if (isset($_POST['nom_produit']) && isset($_POST['description_produit']) && isset($_FILES['file']['name']) && isset($_POST['prix_produit']) && isset($_POST['id_categorie']) && isset($_POST['id_univer']) && isset($_POST['id_entite'])) {

                 
                 $nom = $_POST['nom_produit'];
                 echo "<h1>". $nom ." bien ajouter</h1>";

$description= $_POST['description_produit'];
$prix= number_format((float)$_POST['prix_produit']);
$categorie= $_POST['id_categorie'];
$univer= $_POST['id_univer'];
$entiter= $_POST['id_entite'];

$statusMsg = '';

// Include the database configuration file
$statusMsg = '';

// File upload path
$targetDir = "../img/produit/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);



// if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
 if(!empty($_FILES["file"]["name"])){
 // Allow certain file formats
 $allowTypes = array('jpg','png','jpeg','gif','pdf');

 $fileName = uniqid('img_') . '.' . $fileType;
 

 if(in_array($fileType, $allowTypes)){
     
     // Upload file to server

     if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir . $fileName)){

       
        $updateproduit= $bdd->prepare("UPDATE produit 
        SET  nom_produit=:nom_produit,
         description_produit=:description_produit,
         image_produit=:image_produit,
         prix_produit=:prix_produit
         WHERE id_produit=:id_produit ");
         $updateproduit->execute(array(
            ":nom_produit" => $_POST['nom_produit'],
            ":description_produit" =>  $_POST['description_produit'],
            ":image_produit" => $fileName,
            ":prix_produit" => $_POST['prix_produit'],
            ":id_produit" => $_GET['id_produit']            
        ));


        
        
        header('location:crud_produit.php');

        echo  'mise a jour ok'; 
       
        
         }else{
             $statusMsg = "L'upload de l'image à échoué, merci de réesssayez.";
         } 
     }else{
         $statusMsg = "Malheureusement, il y a eu une erreur lors de l'upload de l'image.";
     }
 }else{
     $statusMsg = 'Désolé, seul les formats suivents sont autorisés : JPG, JPEG, PNG, GIF et PDF.';
 }
}else{
 $statusMsg = 'Merci de choisir un fichier à upload.';
}

// Display status message
echo $statusMsg;

        
  
                 
?>


</form>
</body>
</html>
