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

?>

<body>
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

    <input type="submit" name="envoyer" value="Valider">
</form>
</main>
</body>

