<?php

$license = $_POST['numlicense'];

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $extensions= array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    };
    if($file_size > 2500000){
        $errors[]='File size must be excately 2 MB';
    };
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,'../photo/'.$license.'.'.$file_ext);
    }else{
        print_r($errors);
    };
};

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$datenaissance = $_POST['datenaissance'];
$photo = "photo/".$license.'.'.$file_ext;
$num_maillot = $_POST['num_maillot'];
$telephone = $_POST['telephone'];
$taille = $_POST['taille'];
$poids = $_POST['poids'];
$statut = $_POST['statut'];
$commentaire = $_POST['commentaire'];
$poste = $_POST['poste'];

require './connexionbd.php';
$requete = $linkpdo->prepare("INSERT INTO `joueur`(`numlicence`, `nom`, `prenom`, `datenaissance`, `photo`, `numero`, `telephone`, `IDstatut`, `commentaire`, `IDposte`,`taille`, `poids`) VALUES (:license,:nom,:prenom,:datenaissance,:photo,:num_maillot,:telephone,:statut,:commentaire,:poste,:taille,:poids)");
$requete ->execute(array('license'=>$license ,'nom'=>$nom, 'prenom'=>$prenom,'datenaissance'=>$datenaissance,'photo'=>$photo,'num_maillot'=>$num_maillot,'telephone'=>$telephone,'statut'=>$statut,'commentaire'=>$commentaire,'poste'=>$poste, 'taille'=>$taille, 'poids'=>$poids));
header('Location:../../page/joueur.php');
?>