<?php
session_start();
include 'include/bdd.php';


        $sql = "SELECT * from produit p,appartenir a,categorie c
        WHERE p.id_produit=a.id_produit
        and a.id_categorie=c.id_categorie
        and a.id_categorie=3
        ORDER BY p.id_produit desc
        limit 6 ";
         $requetepop = $bdd->prepare($sql);
         $requetepop->execute();


         $sql2 = "SELECT * from produit p,appartenir a,categorie c
        WHERE p.id_produit=a.id_produit
        and a.id_categorie=c.id_categorie
        and a.id_categorie=2
        ORDER BY p.id_produit desc
        limit 6 ";
         $requetegood = $bdd->prepare($sql2);
         $requetegood->execute();
?>
<!DOCTYPE html>

<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php    include './include/nav-bar.php' ?>
    <div class="bann">
    </div>
        <div class="figurine-pop container">
                <H1 class="titrefigurines">les derniere figurine pop</H1>
                    <div class="grid-container">                       
                            <?php
                                while ($figurine = $requetepop->fetch()) {
                                ?>
                                    <div class="zone"><a href="php/page_produit.php?id_produit=<?= $figurine['id_produit'] ?>">
                                        <img src="img/produit/<?= $figurine['image_produit'] ?>" width="200px" height="200px" >
                                        </a>
                                        <?php   echo $figurine['nom_produit'];
                                        echo ("<br>");
                                        echo $figurine['prix_produit'];?>

                                    </div>
                                <?php
                                }
                            ?>
                                            
                    </div>
        </div>
 
        <div class="goodies container">
                                <H1 class="titregoodies">les dernier Goodies</H1>
                                <div class="grid-container">                       
                            <?php
                                while ($goodies = $requetegood->fetch()) {
                                ?>
                                    <div class="zone"><a href="/php/page_produit.php?id_produit=<?= $goodies['id_produit'] ?>">
                                        <img src="img/produit/<?= $goodies['image_produit'] ?>" width="200px" height="200px" >
                                        </a>
                                        
                                    </div>
                                <?php
                                }
                            ?>
                                            
                    </div>

        </div>

</body>
</html>