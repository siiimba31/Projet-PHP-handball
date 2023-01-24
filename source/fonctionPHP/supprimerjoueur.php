<?php
    //récupération de L'ID
    $ID=htmlspecialchars($_GET["ID"]);
    //supprime le joueur dans JOUEUR
    require './connexionbd.php';
    $requete = $linkpdo->prepare("DELETE FROM `joueur` WHERE `numlicence`=:licence");
    $requete ->execute(array('licence'=>$ID));
    //supprime tous les liens de participer avec le JOUEUR
    $requete = $linkpdo->prepare("DELETE FROM `participer` WHERE `numlicence`=:licence");
    $requete ->execute(array('licence'=>$ID));
?>
<script type='text/javascript'>document.location.replace('../../page/joueur.php');</script>";
