<?php
    session_start();
    require_once '../include/bdd.php';
    


    var_dump(isset($_POST['pseudo_user']) && isset($_POST['mdp_user']));
    var_dump($_POST['mdp_user']);

    if(isset($_POST['pseudo_user']) && isset($_POST['mdp_user']))
    {
      
  
            $pseudo = htmlspecialchars($_POST['pseudo_user']);
            $password = htmlspecialchars($_POST['mdp_user']);
             
            $check = $bdd->prepare('SELECT pseudo_user, mdp_user FROM user WHERE pseudo_user = :pseudo_user');
            $check->execute([':pseudo_user' => $pseudo]);

            if($check->rowCount() == 1)
            {
                $data = $check->fetch();
                    $password = hash('sha256', $password);
                    
                    if($data['mdp_user'] === $password)
                    {
                    $_SESSION['user'] = $pseudo;
                    
                    header('location:../site.php?login_err=success');
                     }
                    else header('location:connexion.php?login_err=password');
            }
            else header('location:connexion.php?login_err=already');
    }else header('Location:connexion.php?login_err=compte_existe_pas');