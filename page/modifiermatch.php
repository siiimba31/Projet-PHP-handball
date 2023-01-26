<?php 
// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='ModifierJoueur';
require 'header.php';
$ID=htmlspecialchars($_GET["ID"]);

require './../source/fonctionPHP/connexionbd.php';
$requete = $linkpdo->prepare("SELECT `resultat`, `nomADV`, `dateM`, `lieu`, `heure` FROM `matchj` WHERE `IDmatch`=:ID");
$requete ->execute(array('ID'=>$ID));
$resultat = $requete->fetchAll();

$result = $resultat[0]['resultat'];
$nomadv = $resultat[0]['nomADV'];
$datedumatch = $resultat[0]['dateM'];
$lieum = $resultat[0]['lieu'];
$heure = $resultat[0]['heure'];

require './../source/fonctionPHP/connexionbd.php';
$requetepj = $linkpdo->prepare("SELECT  joueur.numlicence, joueur.nom, joueur.prenom, nomP, `titulaire`, participer.evaluation FROM `participer`, joueur, poste WHERE participer.numlicence=joueur.numlicence and participer.IDmatch=:ID and poste.IDposte=joueur.IDposte");
$requetepj ->execute(array('ID'=>$ID));
?>

<main>
<form action="../source/fonctionPHP/modifimatch.php?ID=<?php echo $ID?>" enctype = "multipart/form-data" method="post">

    <label for="nomadv"> Adversaire </label>
	<input type="text" id="nomadv" name="nomadv" maxlenght="20" value="<?=$nomadv?>" required/>
    <br>

    <label for="lieum"> Lieu du match </label>
	<select name="lieum" id="lieum" required>
    <option value="<?=$lieum?>"> ( <?php echo $lieum?> )</option>
		<option value="Domicile"> Domicile </option>
		<option value="Exterieur"> Exterieur </option>
	</select>

    <label for="datematch"> Date du match </label>
    <br>
	<input type="date" id="datematch" name="datematch" value="<?=$datedumatch?>" required/>
    <br>

    <label for="heurematch"> Heure du match </label>
    <br>
	<input type="time" id="heurematch" name="heurematch" value="<?=$heure?>" required/>
    <br>

    <?php 
        if($datedumatch> date('Y-m-d')){
            echo "<label for='resultat'>Resultat</label>";
            echo "<input type='text' name='resultat' id='resultat' value='' placeholder='Match Non Terminé' readonly>";
        }else{
            echo "<label for='resultat'>Resultat</label>";
            echo "<select name='resultat' id='resultat' placeholder='Entrez le resultat' required>
                    <option value='$result'>($result)</option>
                    <option value='Gagné'>Gagné</option>
                    <option value='Perdu'>Perdu</option>
                    <option value='Nul'>Nul</option>
            </select>";

        }
    ?>
    <br>

    <div class="contenaire-tableau">
        <?php
            ?>
            <table>
                <tr>
                    <th> Licence </th>
                    <th> Nom </th>
                    <th> Prenom </th>
                    <th> Poste </th>
                    <th> Titulaire </th>
                    <th> Evaluation de 1 à 5 </th>
                </tr>
                <?php
                $i=0;
                $numlicences=[];
                while($resultat = $requetepj->fetch()):
                    $numlicences[$i]=$resultat['numlicence'];
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
                        <?php 
                        if($datedumatch> date('Y-m-d')){
                            echo "<td> <input type='text' name='resultat' id='resultat' value='' placeholder='Match Non Terminé' readonly> </td>";
                        }else{
                            $evalua=$resultat['evaluation'];
                            echo "<td> <input type='number' id='eval' name='eval$i' maxlenght='1' value='$evalua' required> </td>";
                        }
                        ?>
                    </tr>
                <?php
                $i++;
                endwhile;
            ?>
            <input type="hidden" name="licences" value="<?php echo base64_encode(serialize($numlicences)); ?>" required/>
            <input type="hidden" name="i" value="<?php echo $i?>" required/>
            
        </table>
    </div>
    <input type="submit" name="envoyer" value="Valider">
</form>
</main>
<?php 
require 'footer.php';
?>


