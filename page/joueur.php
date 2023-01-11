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
$requete = $linkpdo->query("SELECT `num_licence`, `nom`, `prénom`, `statut` FROM `joueur`, `Statuts` where Statuts.ID_statut=joueur.id_statut ");

?>

<div class="contenaire-tableau">
<h1> Joueur du club </h1>

<table>
        <tr>
            <th> Licence </th>
            <th> nom </th>
            <th> prenom </th>
            <th> statut </th>
        </tr>
    <?php
    while($resultat = $requete->fetch()):
        ?>
        <tr>
            <td> <?php echo $resultat['num_licence'] ?> </td>
            <td> <?php echo $resultat['nom'] ?> </td>
            <td> <?php echo $resultat['prénom'] ?> </td>
            <td> <?php echo $resultat['statut'] ?> </td>
        </tr>
    <?php
endwhile;
?>
</table>

</div>

<a href="ajouterjoueur.php">Ajouter joueur</a>