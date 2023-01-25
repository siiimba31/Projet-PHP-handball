<?php
    //récupération de L'ID
    $ID=htmlspecialchars($_GET["ID"]);
    //supprime le match dans MATCHJ
    require './connexionbd.php';
    $requete = $linkpdo->prepare("DELETE FROM `matchj` WHERE `IDmatch`=:idmatch");
    $requete ->execute(array('idmatch'=>$ID));
    //supprime tous les liens de participer avec le match
    $requete = $linkpdo->prepare("DELETE FROM `participer` WHERE `IDmatch`=:idmatch");
    $requete ->execute(array('idmatch'=>$ID));
?>
<script type='text/javascript'>document.location.replace('../../page/match.php');</script>";
