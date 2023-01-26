<?php 
// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='ModifierJoueur';
require 'header.php';
$ID=htmlspecialchars($_GET["ID"]);

require './../source/fonctionPHP/connexionbd.php';
$requete = $linkpdo->prepare("SELECT `numlicence`, `nom`, `prenom`, `datenaissance`, `photo`, `numero`, `telephone`, joueur.IDstatut, `statut`, `commentaire`, joueur.IDposte, `nomP`, `taille`, `poids` FROM `joueur`, `Statuts`, `poste` WHERE joueur.IDstatut=Statuts.IDstatut AND joueur.IDposte=poste.IDposte AND joueur.numlicence= :licence");
$requete ->execute(array('licence'=>$ID));
$resultat = $requete->fetchAll();
$licence = $resultat[0]['numlicence'];
$nom = $resultat[0]['nom'];
$prenom = $resultat[0]['prenom'];
$datenaissance = $resultat[0]['datenaissance'];
$photo = $resultat[0]['photo'];
$num_maillot = $resultat[0]['numero'];
$telephone = $resultat[0]['telephone'];
$taille = $resultat[0]['taille'];
$poids = $resultat[0]['poids'];
$idstatut = $resultat[0]['IDstatut'];
$statut = $resultat[0]['statut'];
$commentaire = $resultat[0]['commentaire'];
$idposte = $resultat[0]['IDposte'];
$poste = $resultat[0]['nomP'];


?>
<main>
    <form action="../source/fonctionPHP/modifjoueur.php?ID=<?php echo $ID?>" enctype = "multipart/form-data" method="post" class="formulaire">
        <div class="question">
        <label for="license"> Numéro de license </label>
        <input type="number" id="license" name="numlicense" size="13" value="<?=$licence?>" required/>
        </div>

        <div class="question">
        <label for="nom_joueur"> Nom du joueur </label>
        <input type="text" id="nom_joueur" name="nom" maxlenght="30" value="<?=$nom?>" required/>
        </div>

        <div class="question">
        <label for="prenom_joueur"> Prénom du joueur </label>
        <input type="text" id="prenom_joueur" name="prenom" maxlenght="30" value="<?=$prenom?>" required/>
        </div>

        <div class="question">
        <label for="date_de_naissance"> Date de naissance </label>
        <input type="date" id="date_de_naissance" name="datenaissance" value="<?=$datenaissance?>"required/>		
        </div>

        <div class="question">
        <label for="photo_joueur"> Photo du joueur </label>
        <input type="file" id="photo_joueur" accept="image/png, image/jpeg" name="image" />
        </div>

        <div class="question">
        <label for="num_telephone"> Numéro de téléphone </label>
        <input type="text" id="num_telephone" name="telephone" size="10" value="<?=$telephone?>" required/>
        </div>

        <div class="question">
        <label for="taille"> Taille en cm </label>
        <input type="number" id="taille" name="taille" size="3"  value="<?=$taille?>" required/>
        </div>

        <div class="question">
        <label for="poids"> Poids en kg </label>
        <input type="number" id="poids" name="poids" size="3"  value="<?=$poids?>" required/>
        </div>

        <div class="question">
        <label for="numéro_maillot"> Numéro du maillot </label>
        <input type="int" id="numéro_maillot" name="num_maillot" max="99" min="01" value="<?=$num_maillot?>" required/>
        </div>

        <div class="question">
        <label for="commentaire"> Commentaire sur le joueur : </label>
        <textarea name="commentaire" id="commentaire" ><?php echo $commentaire?></textarea>
        </div>

        <div class="question">
        <label for="statuts"> Statut du joueur </label>
        <select name="statut" id="statuts" required>
            <option value="<?=$idstatut?>"> ( <?php echo $statut?> )</option>
            <option value="1">Actif</option>
            <option value="2">Blessé</option>
            <option value="3">Suspendu</option>
            <option value="4">Absent</option>
        </select>
        </div>
        
        <div class="question">
        <label for="postejoueur"> Poste du joueur </label>
        <select name="poste" id="postejoueur" value="<?=$nomp?>" required>
            <option value="<?=$idposte?>"> ( <?php echo $poste?> )</option>
            <option value="1">Gardien</option>
            <option value="2">Demi-centre</option>
            <option value="3">Pivot</option>
            <option value="4">Ailier gauche</option>
            <option value="5">Ailier droit</option>
            <option value="6">Arrière gauche</option>
            <option value="7">Arrière droit</option>
        </select>
        </div>

        <input type="submit" name="miseajour" value="mettre à jour">
    </form>
</mian>
<?php 
require 'footer.php';
?>