<?php
$ID=htmlspecialchars($_GET["ID"]);

require './connexionbd.php';


$requete = $linkpdo->prepare("DELETE FROM `joueur` WHERE `numlicence`=:licence");
$requete ->execute(array('licence'=>$ID));

$requete = $linkpdo->prepare("DELETE FROM `participer` WHERE `numlicence`=:licence");
$requete ->execute(array('licence'=>$ID));
?>

