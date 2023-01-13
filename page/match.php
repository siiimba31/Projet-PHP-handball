<?php 

require './../source/fonctionPHP/est_connecte.php';
utilisateur_connecte();

// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='Match';
require 'header.php';
?>

<?php
require './../source/fonctionPHP/connexionbd.php';
$requete = $linkpdo->prepare("SELECT `IDmatch`, `resultat`, `nomADV`, `dateM`, `lieu`, `heure` FROM `matchj`");
$requete ->execute();
?>
<body>
<main>
    <div>
        <a class="button-75" href="ajoutermatch.php">Ajouter match</a>
    </div>

    <div class="contenaire-tableau">
        <h1> Joueur du club </h1>

        <table>
            <tr>
                <th> Adversaire </th>
                <th> Lieu du match </th>
                <th> Date du match </th>
                <th> Heure du match </th>
                <th> Résultat du match </th>
            </tr>
            <?php
            while($resultat = $requete->fetch()):
            ?>
                <tr>
                    <td> <?php echo $resultat['nomADV'] ?> </td>
                    <td> <?php echo $resultat['lieu'] ?> </td>
                    <td> <?php echo $resultat['dateM'] ?> </td>
                    <td> <?php echo $resultat['heure'] ?> </td>
                    <td> <?php echo $resultat['resultat'] ?> </td>
                </tr>
            <?php
            endwhile;
            ?>
        </table>
    </div>
</main>
</body>
