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
            <form action="../traitement/inscription.php"method="post">
            <div class=" text-center "><h1>Inscription</h1>
            </div>
            <div class="form-group ">
                <div class="enregistrer">
            <p>
                <label for="pseudo"  required></label>
                <input id="pseudo" class="form-control" type="text" name="pseudo_user" placeholder="pseudo">
            </p>
            <p>
                <label for="nom"  required></label>
                <input id="nom" class="form-control" type="text" name="nom_user" placeholder="nom">
            </p>
            <p>
                <label for="prenom"  required></label>
                <input id="prenom" class="form-control" type="text" name="prenom_user" placeholder="prenom">
            </p>

            <p>
                <label for="email"  required></label>
                <input id="email" class="form-control" type="text" name="email_user" placeholder="email@valide.com">
            </p>
            <p>
                <label for="age"  required></label>
                <input id="age" class="form-control" type="date" name="ddn_user" placeholder="date de naissance">
            </p>
            <p>
                <label for="password"  required></label>
                <input id="password" class="form-control" type="password" name="mdp_user" placeholder="password" > 
            </p>
            <p>
                <label for="password"  required></label>
                <input id="retype-password"  class="form-control" type="password" name="mdp_user2" placeholder="password"> 
            </p>
         
         
            <p><input type="submit"  value="S'inscrire" class="btn btn-outline-dark"><a href="../log.php"><button class="btn btn-outline-dark">retour</button></a></p>
            <p><a href="connexion.php">si vous avez deja  un compte</a></p>
        </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>