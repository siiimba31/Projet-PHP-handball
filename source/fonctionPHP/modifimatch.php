<?php
    //récupération varivle du formulaire
    $ID=htmlspecialchars($_GET["ID"]);
    $nomadv = $_POST['nomadv'];
    $lieum = $_POST['lieum'];
    $datematch = $_POST['datematch'];
    $heurematch = $_POST['heurematch'];
    $resultat = $_POST['resultat'];
    //requete de mise à jour
    require './connexionbd.php';
    $requete = $linkpdo->prepare("UPDATE `matchj` SET `resultat`=:resultat,`nomADV`=:nomadv,`dateM`=:datem,`lieu`=:lieum,`heure`=:heurem WHERE IDmatch=:id");
    $requete ->execute(array('id'=>$ID,'resultat'=>$resultat, 'nomadv'=>$nomadv, 'datem'=>$datematch, 'lieum'=>$lieum, 'heurem'=>$heurematch));
?>
<script type='text/javascript'>document.location.replace('../../page/match.php');</script>";