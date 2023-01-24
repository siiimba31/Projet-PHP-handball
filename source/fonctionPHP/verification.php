<?php
    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        // connexion à la base de données
        require './connexionbd.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        if($username !== "" && $password !== ""){
            //requete de récupération du mot de passe
            $requete = $linkpdo->prepare("SELECT motdepasse as mdp FROM utilisateur where username =:username ");
            $requete ->execute(array('username'=>$username));
            $resultat = $requete->fetchAll();
            echo $resultat[0]['mdp'];
            $hashmotdepasse = $resultat[0]['mdp'];
            $result = password_verify($password, $hashmotdepasse);
            echo $result;
            // nom d'utilisateur et mot de passe correctes
            if($result!=0) {
                $_SESSION['connecte'] = $username;
                ?>
                <script type='text/javascript'>document.location.replace('../../page/accueil.php');</script>";
                <?php
            }else{
                ?>
                <script type='text/javascript'>document.location.replace('../../index.php');</script>";
                <?php
            }
        }else{
            ?>
            <script type='text/javascript'>document.location.replace('../../index.php');</script>";
            <?php
        }
    }else{
        ?>
        <script type='text/javascript'>document.location.replace('../../index.php');</script>";
        <?php
    }
?>