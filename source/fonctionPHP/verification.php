<?php
    session_start();
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        // connexion à la base de données
        require './connexionbd.php';

        $username=$_POST['username'];
        $password=$_POST['password'];
        if($username !== "" && $password !== "")
        {
            $requete = $linkpdo->prepare("SELECT motdepasse as mdp FROM utilisateur where username =:username ");
            $requete ->execute(array('username'=>$username));
            $resultat = $requete->fetchAll();
            echo $resultat[0]['mdp'];
            $hashmotdepasse = $resultat[0]['mdp'];
            $result = password_verify($password, $hashmotdepasse);
            echo $result;

            if($result!=0) // nom d'utilisateur et mot de passe correctes
             {
                 $_SESSION['connecte'] = $username;
                 header('Location: ../../page/accueil.php');
             }
             else
             {
                 header('Location: ../../index.php?erreur=1'); // utilisateur ou mot de passe incorrect
             }
        }
         else
         {
             header('Location: ../../index.php?erreur=2'); // utilisateur ou mot de passe vide
         }
    }
     else
     {
         header('Location: ../../index.php');
    }
    
?>