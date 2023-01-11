<?php
    $license = $_POST['num_license'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $datenaissance = $_POST['datenaissance'];
    $photo = "../photo/".$license.'.'.$file_ext;
    $num_maillot = $_POST['num_maillot'];
    $telephone = $_POST['telephone'];
    $statut = $_POST['statut'];
    $commentaire = $_POST['commentaire'];
    $poste = $_POST['poste'];

    

    require './connexionbd.php';
    $requete = $linkpdo->prepare("INSERT INTO `joueur`(`num_licence`, `nom`, `prénom`, `date_naissance`, `photo`, `numero`, `telephone`, `id_statut`, `commentaire`, `id_poste`) VALUES (:license,:nom,:prenom,:datenaissance,:photo,:num_maillot,:telephone,:statut,:commentaire,:poste)");
    $requete ->execute(array('license'=>$license ,'nom'=>$nom, 'prenom'=>$prenom,'datenaissance'=>$datenaissance,'photo'=>$photo,'num_maillot'=>$num_maillot,'telephone'=>$telephone,'statut'=>$statut,'commentaire'=>$commentaire,'poste'=>$commentaire));

    header('Location: ../../page/joueur.php');
?>