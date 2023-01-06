<?php
    session_start();
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        // connexion à la base de données
        require './connexionbd.php';

        $username=$_POST['username'];
        $password=$_POST['password'];
        echo $username;
        if($username !== "" && $password !== "")
        {
            $requete = $linkpdo->prepare("SELECT mot_de_passe as mdp FROM utilisateur where nom_utilisateur = '".$username."' ");
            $requete->execute();
            $reponse = $requete->fetch(PDO::FETCH_ASSOC);
            echo "bjr".$reponse['mdp'];
            $hashmotdepasse = $reponse['mdp'];
            $resultat = password_verify($password, $hashmotdepasse);


            // if($count!=0) // nom d'utilisateur et mot de passe correctes
            // {
            //     $_SESSION['connecte'] = $username;
            //     header('Location: ./page/accueil.php');
            // }
            // else
            // {
            //     header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
            // }
        }
        // else
        // {
        //     header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
        // }
    }
    // else
    // {
    //     header('Location: login.php');
    // }
    
?>