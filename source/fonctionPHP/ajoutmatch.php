<?php

$nomadv = $_POST['nomadv'];
$lieum = $_POST['lieum'];
$datematch = $_POST['datematch'];
$heurematch = $_POST['heurematch'];


require './connexionbd.php';
$requete = $linkpdo->prepare("INSERT INTO `matchj`(`nomADV`, `dateM`, `lieu`, `heure`) VALUES (:nomADV,:dateM,:lieu,:heure)");
$requete ->execute(array('nomADV'=>$nomadv, 'dateM'=>$datematch,'lieu'=>$lieum,'heure'=>$heurematch));

?>