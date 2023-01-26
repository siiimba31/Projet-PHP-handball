<?php
    //récuperation des variables
    $ID=htmlspecialchars($_GET["ID"]);
    $numlicence=htmlspecialchars($_GET["licence"]);
    //requete d'insertion dans JOUEUR
    require './connexionbd.php';
    $requete = $linkpdo->prepare("DELETE FROM `participer` WHERE `numlicence`=:numlicence and `IDmatch`=:ID");
    $requete ->execute(array('numlicence'=>$numlicence, 'ID'=>$ID));
    header("Location:../../page/preparermatch.php?ID=$ID");
?>
