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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

<!-- Latest compiled JavaScript -->
    <title>Document</title>
</head>
<body>



<?php


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
<form action="ajout_produit.php" enctype="multipart/form-data" method="POST">
					
        
        <div class="inscription">
        
            <div class="container  border border-dark formulaire">
                <h4 class="modal-title">ajouter article</h4>
						<div class="form-group">
							<label>nom produit</label>
							<input type="text" class="form-control" name ="nom_produit" required>
						</div>
						<div class="form-group">
							<label>descritpion produit</label>
							<textarea type="text" class="form-control" name="description_produit" required></textarea>
						</div>
						<div class="form-group">
							<label>image produit</label>
							<input type="file" name="file" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Prix produit</label>
							<input type="text" class="form-control" name="prix_produit" required>
						</div>

					<div class="cont_categorie">
                        <div class="categorie">choisir la categorie :
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
                        <div class="categorie">choisir l'univers :
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
                        <div class="categorie">choisir le personnage :
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
						
                        <button type='submit'>ajouter</button>
					</div>
            </div>
        </div>
</form>

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

            $inserttoproduit = $bdd->prepare("INSERT INTO produit (nom_produit, description_produit, image_produit, prix_produit) VALUES (?,?,?,?)");
            $inserttoproduit->execute(array($_POST['nom_produit'], $_POST['description_produit'],$fileName, intval($_POST['prix_produit']), ));
            $produit = $bdd->lastInsertId();

            $insertoappartenir = $bdd->prepare("INSERT INTO appartenir (id_categorie, id_produit) VALUES(?,?)");
            $insertoappartenir->execute(array($categorie, $produit));

            $selecttofournir= $bdd->prepare("SELECT * FROM fournir WHERE id_categorie=".$categorie." and id_univer=".$univer." ");
            $selecttofournir->execute();
           
            $countfournir=$selecttofournir->rowcount();

                if ($countfournir >= 1) {

               
                                        }
                    else {
                         $insertofournir = $bdd->prepare("INSERT INTO fournir (id_categorie, id_univer) VALUES(?,?)");
                $insertofournir->execute(array($categorie, $univer));
            }

            $selecttoavoir= $bdd->prepare("SELECT * FROM avoir WHERE id_entite=".$entiter." and id_univer=".$univer."");
            $selecttoavoir->execute();
           
            $countavoir=$selecttoavoir->rowcount();

                if ($countavoir >= 1 ) {

                
                                        }

                    else {
                        $insertoavoir = $bdd->prepare("INSERT INTO avoir (id_entite, id_univer) VALUES(?,?)");
                $insertoavoir->execute(array($entiter, $univer));
            }
            
           
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