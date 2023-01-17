<?php
$ID=htmlspecialchars($_GET["ID"]);

require './connexionbd.php';


$requete = $linkpdo->prepare("DELETE FROM `matchj` WHERE `IDmatch`=:idmatch");
$requete ->execute(array('idmatch'=>$ID));

$requete = $linkpdo->prepare("DELETE FROM `participer` WHERE `IDmatch`=:idmatch");
$requete ->execute(array('idmatch'=>$ID));
?>

