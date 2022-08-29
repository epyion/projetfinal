<?php
session_start();
include '../include/bdd.php';


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

         $sql3 = "SELECT * from produit p,appartenir a,categorie c
        WHERE p.id_produit=a.id_produit
        and a.id_categorie=c.id_categorie
        and a.id_categorie=6
        ORDER BY p.id_produit desc
        limit 6 ";
         $requetevet = $bdd->prepare($sql3);
         $requetevet->execute();



?>
<!DOCTYPE html>

<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php    include '../include/nav-bar.php' ?>
    <div class="bann">
    </div>
        <div class="figurine-pop container">
                <H1 class="titrefigurines">les derniere figurine pop</H1>
                    <div class="grid-container">                       
                            <?php
                                while ($figurine = $requetepop->fetch()) {
                                ?>
                                    <div class="zone"><a href="../php/page_produit.php?id_produit=<?= $figurine['id_produit'] ?>">
                                        <img src="../img/produit/<?= $figurine['image_produit'] ?>" width="200px" height="200px" >
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
                                        <img src="../img/produit/<?= $goodies['image_produit'] ?>" width="200px" height="200px" >
                                        </a>
                                        <?php   echo $goodies['nom_produit'];
                                        echo ("<br>");
                                        echo $goodies['prix_produit'];?>

                                        
                                    </div>
                                <?php
                                }
                            ?>
                                            
                    </div>

        </div>
        <div class="vetement container">
                <H1 class="titrevetement">les dernier vetement et accessoir</H1>
                    <div class="grid-container">                       
                            <?php
                                while ($vetement = $requetevet->fetch()) {
                                ?>
                                    <div class="zone"><a href="../php/page_produit.php?id_produit=<?= $vetement['id_produit'] ?>">
                                        <img src="../img/produit/<?= $vetement['image_produit'] ?>" width="200px" height="200px" >
                                        </a>
                                        <?php   echo $vetement['nom_produit'];
                                        echo ("<br>");
                                        echo $vetement['prix_produit'];?>

                                    </div>
                                <?php
                                }
                            ?>
                                            
                    </div>
        </div>

        <h1 class="text-center text-light bg-dark"> Tous vos Anime, Goodies, manga, et bien d autre sont sur ANIME-PROJECT</h1>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="../javascript/bootstrap.js"></script>
        <script src="javascript/bootstrap.js"></script>
</body>
</html>