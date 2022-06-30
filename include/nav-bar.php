
<?php 
include 'include/bdd.php'
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
<?php 
    $sql = "SELECT * FROM user u, possede p, role r 
    WHERE  u.id_user=p.id_user 
    and p.id_role=r.id_role
    and u.pseudo_user=:user ";
            $requete = $bdd->prepare($sql);
            $requete->execute(array(
                ':user' => $_SESSION['user']
            ));
            $row = $requete->fetch();
            ?>
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" >Anime-project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span ></span>
      <span ></span>
      <span ></span>

    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav margin-left-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="site.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Lien</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Manga</a></li>
            <li><a class="dropdown-item" href="#">Animé</a></li>
            <li><a class="dropdown-item" href="#">figurine</a></li>
            <li><a class="dropdown-item" href="#">Goodies</a></li>
            <li><a class="dropdown-item" href="#">Edition Limité</a></li>
            <?php
  // $bdd = mysqli_connect("localhost", "root", "", "anime-project");

  // $query = "SELECT ddn_user FROM user";
  // $res = mysqli_query($bdd, $query);
  // while($row = mysqli_fetch_array($res)) {
  $dateNaissance = $row['ddn_user'];
  $aujourdhui = date("Y-m-d");
  $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
  if ($diff->format('%y') >= 18){
    ?><li><a class='dropdown-item' href='#'>Adulte</a></li> 
  <?php } ?>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Mon Espace</a></li>
            <?php

            if ($row["id_role"] == 2) {
            ?>
            <li><a class="dropdown-item" href="php/crud-produit.php">Gestion des produit</a></li>
            <li><a class="dropdown-item" href="php/crud.php">Gestion des utilisateur</a></li>

            <?php } ?>
            
            <li><a class="dropdown-item" href="#">Mon Panier</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="../site.php" class="nav-link" >Contactez-nous</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>



    </div>





    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="javascript/bootstrap.js"></script>
</body>
</html>