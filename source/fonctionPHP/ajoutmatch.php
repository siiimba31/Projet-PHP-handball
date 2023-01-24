<?php
    //récupération des variables du formulaire
    $nomadv = $_POST['nomadv'];
    $lieum = $_POST['lieum'];
    $datematch = $_POST['datematch'];
    $heurematch = $_POST['heurematch'];
    //requete d'insertion dans JOUEUR
    require './connexionbd.php';
    $requete = $linkpdo->prepare("INSERT INTO `matchj`(`nomADV`, `dateM`, `lieu`, `heure`) VALUES (:nomADV,:dateM,:lieu,:heure)");
    $requete ->execute(array('nomADV'=>$nomadv, 'dateM'=>$datematch,'lieu'=>$lieum,'heure'=>$heurematch));
?>
<script type='text/javascript'>document.location.replace('../../page/match.php');</script>";