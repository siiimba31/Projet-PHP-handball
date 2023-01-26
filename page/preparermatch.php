<?php 
// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='Préparer Match';
require 'header.php';
$ID=htmlspecialchars($_GET["ID"]);

?>

<?php
require './../source/fonctionPHP/connexionbd.php';
$requetejf = $linkpdo->prepare("SELECT joueur.numlicence, `nom`, `prenom`, `photo`, `statut`, `commentaire`, `nomP`, `taille`, `poids` FROM `joueur`, `Statuts`, `poste` WHERE joueur.IDstatut=Statuts.IDstatut AND joueur.IDposte=poste.IDposte AND joueur.numlicence NOT IN (SELECT numlicence FROM participer WHERE participer.IDmatch=:ID) AND joueur.IDstatut=1");
$requetejf ->execute(array('ID'=>$ID));
?>

<?php
require './../source/fonctionPHP/connexionbd.php';
$requetepj = $linkpdo->prepare("SELECT  joueur.numlicence, joueur.nom, joueur.prenom, nomP, `titulaire` FROM `participer`, joueur, poste WHERE participer.numlicence=joueur.numlicence and participer.IDmatch=:ID and poste.IDposte=joueur.IDposte");
$requetepj ->execute(array('ID'=>$ID));
?>

<main>
    <br>
    <h1> Joueur Actif pouvant participer au Match : </h1>
    <br>
    <div class="contenaire-tableau">
        <table>
            <tr>
                <th> Licence </th>
                <th> Nom </th>
                <th> Prenom </th>
                <th> Photo </th>
                <th> Statut </th>
                <th> Commentaire </th>
                <th> Poste </th>
                <th> Taille </th>
                <th> Poids </th>
                <th> Titulaire </th>
                <th> Remplaçant </th>
            </tr>
            <?php
            while($resultat = $requetejf->fetch()):
            ?>
                <tr>
                    <?php $photo=$resultat['photo']; ?>
                    <td> <?php echo $resultat['numlicence'] ?> </td>
                    <td> <?php echo $resultat['nom'] ?> </td>
                    <td> <?php echo $resultat['prenom'] ?> </td>
                    <td> <?php echo "<img class='imgJ' src='../source/".$photo."' alt='Photo'></img>";?></td>
                    <td> <?php echo $resultat['statut'] ?> </td>
                    <td> <?php echo $resultat['commentaire'] ?> </td>
                    <td> <?php echo $resultat['nomP'] ?> </td>
                    <td> <?php echo $resultat['taille'] ?> </td>
                    <td> <?php echo $resultat['poids'] ?> </td>
                    <td> <a href="../source/fonctionPHP/ajouttitulaire.php?ID=<?php echo $ID?>&licence=<?php echo $resultat['numlicence']?>"><img class="imgB" src="../source/img/titulaire.jpg" alt="Modifier"></img></a> </td>
                    <td> <a href="../source/fonctionPHP/ajoutremplacant.php?ID=<?php echo $ID?>&licence=<?php echo $resultat['numlicence']?>"> <img class="imgB" src="../source/img/bench.png" alt="Modifier"> </img> </a> </td>
                    
                </tr>
            <?php
            endwhile;
            ?>
        </table>
    </div>
    <br>
    <h1> Joueur participant au Match </h1>
    <br>
    <div class="contenaire-tableau">
        <table>
            <tr>
                <th> Licence </th>
                <th> Nom </th>
                <th> Prenom </th>
                <th> Poste </th>
                <th> Titulaire </th>
                <th> Enlevé </th>
            </tr>
            <?php
            while($resultat = $requetepj->fetch()):
            ?>
                <tr>
                    <td> <?php echo $resultat['numlicence'] ?> </td>
                    <td> <?php echo $resultat['nom'] ?> </td>
                    <td> <?php echo $resultat['prenom'] ?> </td>
                    <td> <?php echo $resultat['nomP'] ?> </td>
                    <td> 
                        <?php 
                        if ($resultat['titulaire']==1){
                            echo "Titulaire";
                        }else {
                            echo "Remplaçant";
                        }
                        ?>
                    </td>
                    <td> <a href="../source/fonctionPHP/supprimeparticiper.php?ID=<?php echo $ID?>&licence=<?php echo $resultat['numlicence']?>"> <img class="imgB" src="../source/img/supprimer.png" alt="Modifier"> </img> </a> </td>
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

