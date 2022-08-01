<?php
    require_once '../include/bdd.php';


    if(isset($_POST['pseudo_user']) && isset($_POST['nom_user']) && isset($_POST['prenom_user']) && isset($_POST['email_user']) && isset($_POST['ddn_user']) && isset($_POST['mdp_user']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo_user']);
        $nom = htmlspecialchars($_POST['nom_user']);
        $prenom = htmlspecialchars($_POST['prenom_user']);
        $email = htmlspecialchars($_POST['email_user']);
        $ddn = ($_POST['ddn_user']);
        $password = htmlspecialchars($_POST['mdp_user']);
        $date = date ('Y-m-d', time());


        
        $check = $bdd->prepare('SELECT pseudo_user, nom_user, prenom_user, email_user, ddn_user, mdp_user  FROM user WHERE pseudo_user =?');
        $check->execute(array($pseudo));
        $data = $check->fetch();
        $row = $check->rowCount();
        $majuscule = preg_match('(?=.{1,}[A-Z])', $_POST['mdp_user']);
        $chiffre = preg_match('(?=.{1,}[0-9.])', $_POST['mdp_user']);

        // if($majuscule == 0) {
        //     echo 'mettre une majuscule dans le mot de passe';
        // }
        // else {

        // }
        // if($chiffre == 0) {
        //     echo 'mettre un chiffre dans le mot de passe';
        // }
        // else {

        // }
        if($row == 0)
        {
            if(strlen($pseudo) <= 100)
            {

                if ($_POST['mdp_user'] == $_POST['mdp_user2'])
                {
                        // $pattern = '@^(?=.{8,}$)(?=.*[a-z]{2})(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$@';
                        // preg_match($pattern, $password);
                        $password2 = hash('sha256', $password);
                      
                            
                            $insert = $bdd->prepare('INSERT INTO user(nom_user, prenom_user, pseudo_user, email_user, mdp_user, ddn_user, ddi_user) VALUES(:nom_user, :prenom_user, :pseudo_user, :email_user, :mdp_user, :ddn_user, :ddi_user)');
                            $insert->execute(array(
                                'nom_user' => $nom,
                                'prenom_user' => $prenom,
                                'pseudo_user' => $pseudo,
                                'email_user' => $email,
                                'mdp_user' => $password2,
                                'ddn_user' => $ddn,
                                'ddi_user' => $date
                                 
                            ));

                            $select = $bdd->prepare('SELECT * FROM user WHERE email_user=:email_user');
                            $select->execute(array(
                                'email_user' => $email,
                            ));
                            $affiche=$select->fetch();


                             $inserttopossede = $bdd->prepare('INSERT INTO possede(id_user,id_role)VALUES(:id_user, :id_role)');
                             $inserttopossede->execute(array(
                                'id_user' => $affiche['id_user'],
                                'id_role' => 1
                             ));
                           

                        header('location:../php/connexion?reg_err=success');
                }
                else {
                    echo $_POST['mdp_user'] ; echo "<br>";
                    echo $_POST['mdp_user2'];
                    // header('location:../php/connexion?reg_err=mdpfaux');
                    }
                }else header('location:inscription.php');
            }else header('location:inscription.php?reg_err=pseudo_length');
        }else header('location:inscription.php?reg_err=already');
    
