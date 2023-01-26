<?php
    //récuperation des variables
    $ID=htmlspecialchars($_GET["ID"]);
    $numlicence=htmlspecialchars($_GET["licence"]);
    $titulaire = 0;
    //requete d'insertion dans JOUEUR
    require './connexionbd.php';
    $requete = $linkpdo->prepare("INSERT INTO `participer`(`IDmatch`, `titulaire`, `numlicence`) VALUES (:IDm,:titulaire,:numlicence)");
    $requete ->execute(array('IDm'=>$ID, 'titulaire'=>$titulaire, 'numlicence'=>$numlicence));
    header("Location:../../page/preparermatch.php?ID=$ID");
?>
