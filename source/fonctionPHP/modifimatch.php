<?php
    //récupération varivle du formulaire
    $ID=htmlspecialchars($_GET["ID"]);
    $i=$_POST["i"];

    if (isset($_POST["licences"]))
    {
        $tt=unserialize(base64_decode($_POST["licences"]));
        for ($j=0; $j<$i; $j++){
            $licence=$tt[$j];
            $eval= $_POST['eval'.$j.''];
            require './connexionbd.php';
            $requete = $linkpdo->prepare("UPDATE `participer` P SET P.`evaluation`=:eval WHERE `IDmatch` = :IDm AND `numlicence` = :licence");
            $requete ->execute(array('IDm'=>$ID,'eval'=>$eval, 'licence'=>$licence));

        }
    }
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