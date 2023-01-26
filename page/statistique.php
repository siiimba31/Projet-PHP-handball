<?php 
// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='Statistique';
require 'header.php';
?>
<?php
require './../source/fonctionPHP/connexionbd.php';
$requete = $linkpdo->prepare("select joueur.numlicence,nom,prenom,statut , nomP , SUM(case when titulaire=1 then 1 else 0 end) as titul , SUM(case when titulaire=0 then 1 else 0 end) as remplacant , AVG(evaluation) as eval, SUM(case when resultat=\"Gagné\" then 1 else 0 end) as gagne FROM `joueur`, `Statuts`, `poste`,`participer`,`matchj` WHERE joueur.IDstatut=Statuts.IDstatut AND joueur.IDposte=poste.IDposte AND matchj.IDmatch=participer.IDmatch AND joueur.numlicence = participer.numlicence GROUP BY joueur.numlicence,nom,prenom,statut , nomP ORDER BY `joueur`.`numlicence` ASC");
$requete ->execute();
$requete2 = $linkpdo->prepare("select COUNT(resultat) as nbmatch, SUM(case when resultat='Gagné' then 1 else 0 end) as gagne,(SUM(case when resultat='Gagné' then 1 else 0 end)/ COUNT(resultat)) as pctgagne, SUM(case when resultat='Nul' then 1 else 0 end) as nul, (SUM(case when resultat='Nul' then 1 else 0 end)/ COUNT(resultat)) as pctnul , SUM(case when resultat='perdu' then 1 else 0 end) as perdu, (SUM(case when resultat='perdu' then 1 else 0 end)/ COUNT(resultat)) as pctperdu FROM `matchj`");
$requete2 ->execute();
?>

<main>
<div class="contenaire-tableau">
        <h1> Statistique de Match  </h1>

        <table>
            <tr>
                <th> Nombre de match </th>
                <th> Match gagner </th>
                <th> Poucentage gagner</th>
                <th> Match nul </th>
                <th> Poucentage nul</th>
                <th> Match perdu </th>
                <th> Poucentage perdu</th>
                
            </tr>
            <?php
            while($resultat = $requete2->fetch()):
            ?>
                <tr>
                    <td> <?php echo $resultat['nbmatch'] ?> </td>
                    <td> <?php echo $resultat['gagne'] ?> </td>
                    <td> <?php echo $resultat['pctgagne'] ?> </td>
                    <td> <?php echo $resultat['nul'] ?> </td>
                    <td> <?php echo $resultat['pctnul'] ?> </td>
                    <td> <?php echo $resultat['perdu'] ?> </td>
                    <td> <?php echo $resultat['pctperdu'] ?> </td>

                </tr>
            <?php
            endwhile;
            ?>
        </table>
    </div>

    <br>
    <br>

    <div class="contenaire-tableau">
        <h1> Statistique des Joueurs  </h1>

        <table>
            <tr>
                <th> Licence </th>
                <th> Nom </th>
                <th> Prenom </th>
                <th> Statut </th>
                <th> Poste </th>
                <th> Nombre sélection comme Titulaire </th>
                <th> Nombre sélection comme Remplaçant</th>
                <th> Moyenne de l'évaluation de l'entraineur </th>
                <th> Nombre de Match gagné </th>
                
            </tr>
            <?php
            while($resultat = $requete->fetch()):
            ?>
                <tr>
                <td> <?php echo $resultat['numlicence'] ?> </td>
                    <td> <?php echo $resultat['nom'] ?> </td>
                    <td> <?php echo $resultat['prenom'] ?> </td>
                    <td> <?php echo $resultat['statut'] ?> </td>
                    <td> <?php echo $resultat['nomP'] ?> </td>
                    <td> <?php echo $resultat['titul'] ?> </td>
                    <td> <?php echo $resultat['remplacant'] ?> </td>
                    <td> <?php echo round($resultat['eval'],2) ?> </td>
                    <td> <?php echo $resultat['gagne'] ?> </td>
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
