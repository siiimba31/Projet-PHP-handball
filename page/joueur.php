<?php 
// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='Joueur';
require 'header.php';
?>
<?php
require './../source/fonctionPHP/connexionbd.php';
$requete = $linkpdo->prepare("SELECT `numlicence`, `nom`, `prenom`, `datenaissance`, `photo`, `numero`, `telephone`, `statut`, `commentaire`, `nomP`, `taille`, `poids` FROM `joueur`, `Statuts`, `poste` WHERE joueur.IDstatut=Statuts.IDstatut AND joueur.IDposte=poste.IDposte");
$requete ->execute();
?>

<main>
    <br>
    <div>
        <a class="button-75" href="ajouterjoueur.php">Ajouter joueur</a>
    </div>
    <br>
    <h1> Joueur du club </h1>
    <br>
    <div class="contenaire-tableau">
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
                    <?php $photo=$resultat['photo']; ?>
                    <td> <?php echo $resultat['numlicence'] ?> </td>
                    <td><?php echo "<img class='imgJ' src='../source/".$photo."' alt='Photo'></img>";?></td>
                    <td> <?php echo $resultat['nom'] ?> </td>
                    <td> <?php echo $resultat['prenom'] ?> </td>
                    <td> <?php echo $resultat['datenaissance'] ?> </td>
                    <td> <?php echo $resultat['telephone'] ?> </td>
                    <td> <?php echo $resultat['taille'] ?> </td>
                    <td> <?php echo $resultat['poids'] ?> </td>
                    <td> <?php echo $resultat['numero'] ?> </td>
                    <td> <?php echo $resultat['nomP'] ?> </td>
                    <td> <?php echo $resultat['statut'] ?> </td>
                    <td> <?php echo $resultat['commentaire'] ?> </td>
                    <td> <a href="modifierjoueur.php?ID=<?php echo $resultat['numlicence']?>"><img class="imgB" src="../source/img/modifier.png" alt="Modifier"></img></a> </td>
                    <td> <a href="../source/fonctionPHP/supprimerjoueur.php?ID=<?php echo $resultat['numlicence']?>"><img class="imgB" src="../source/img/supprimer.png" alt="Supprimer"></img></a> </td>
                </tr>
            <?php
            endwhile;
            ?>
        </table>
    </div>
</main>
<?php 
require 'footer.php';
?>
