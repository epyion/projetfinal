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
        <div class="inscription">
        <div class="container  border border-dark formulaire">
            <form action="../traitement/connexion.php" method="post">
            <div class=" text-center "><h1>Connexion</h1>
            </div>
            <div class="form-group ">
                <div class="connexion">
            <p>
                <label for="pseudo"  required></label>
                <input id="pseudo" class="form-control" type="text" name="pseudo_user" placeholder="pseudo">
            </p>
            <p>
                <label for="password"  required></label>
                <input id="password" class="form-control" type="password" name="mdp_user" placeholder="password" > 
            </p>
         
            <p><input type="submit"  value="Connexion"class="btn btn-outline-dark"><a href="../log.php"><button class="btn btn-outline-dark">retour</button></a></p>
            <p><a href="inscription.php">si vous n'avez pas de compte</a></p>
        </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>