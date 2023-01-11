<?php 

require './../source/fonctionPHP/est_connecte.php';
utilisateur_connecte();

// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='Joueur';
require 'header.php';
?>


<?php
require './../source/fonctionPHP/connexionbd.php';
$requete = $linkpdo->prepare("SELECT `num_licence`, `nom`, `prénom`, `date_naissance`, `photo`, `numero`, `telephone`, `statut`, `commentaire`, `intituler_poste`, `Taille`, `poids` FROM `joueur`, `Statuts`, `poste` WHERE joueur.id_statut=Statuts.id_statut AND joueur.id_poste=poste.id_poste");
$requete ->execute();
?>

<div class="contenaire-tableau">
<h1> Joueur du club </h1>

<table>
        <tr>
            <th> Licence </th>
            <th> Photo </th>
            <th> Nom </th>
            <th> Prenom </th>
            <th> Date de naissance </th>
            <th> Téléphone </th>
            <th> Taille </th>
            <th> Poids </th>
            <th> Numéro du joueur </th>
            <th> Poste </th>
            <th> Statut </th>
            <th> Commentaire </th>
            <th> Modifier </th>
            <th> Supprimer </th>
        </tr>
    <?php
    while($resultat = $requete->fetch()):
        ?>
        <tr>
            <td> <?php echo $resultat['num_licence'] ?> </td>
            <td> <?php echo $resultat['photo'] ?> </td>
            <td> <?php echo $resultat['nom'] ?> </td>
            <td> <?php echo $resultat['prénom'] ?> </td>
            <td> <?php echo $resultat['date_naissance'] ?> </td>
            <td> <?php echo $resultat['telephone'] ?> </td>
            <td> <?php echo $resultat['Taille'] ?> </td>
            <td> <?php echo $resultat['poids'] ?> </td>
            <td> <?php echo $resultat['numero'] ?> </td>
            <td> <?php echo $resultat['intituler_poste'] ?> </td>
            <td> <?php echo $resultat['statut'] ?> </td>
            <td> <?php echo $resultat['commentaire'] ?> </td>
            <td> <a href="modifierjoueur.php?ID='".<?php echo $resultat['num_licence']?>>Modifier</a> </td>
            <td> <a href="supprimerjoueur.php?ID='".<?php echo $resultat['num_licence']?>>Supprimer</a> </td>
        </tr>
    <?php
endwhile;
?>
</table>

</div>

<a href="ajouterjoueur.php">Ajouter joueur</a>
