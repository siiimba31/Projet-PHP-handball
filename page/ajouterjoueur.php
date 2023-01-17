<?php 

require './../source/fonctionPHP/est_connecte.php';
utilisateur_connecte();

// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title="Ajout d'un joueur";
require 'header.php';
?>

<body>
<main>
<form action="../source/fonctionPHP/ajoutjoueur.php" enctype = "multipart/form-data" method="post">

    <label for="license"> Numéro de license </label>
	<input type="number" id="license" name="numlicense" size="13" placeholder="0123456789101" required/>
    <br>

    <label for="nom_joueur"> Nom du joueur </label>
	<input type="text" id="nom_joueur" name="nom" maxlenght="30" placeholder="Dupond" required/>
    <br>

    <label for="prenom_joueur"> Prénom du joueur </label>
	<input type="text" id="prenom_joueur" name="prenom" maxlenght="30" placeholder="Marie" required/>
    <br>

    <label for="date_de_naissance"> Date de naissance </label>
    <br>
	<input type="date" id="date_de_naissance" name="datenaissance" required/>
    <br>		

    <label for="photo_joueur"> Photo du joueur </label>
	<input type="file" id="photo_joueur" accept="image/png, image/jpeg" name="image" />
    <br>

    <label for="num_telephone"> Numéro de téléphone </label>
    <input type="text" id="num_telephone" name="telephone" size="10" placeholder="0611223344" required/>
    <br>

    <label for="taille"> Taille en cm </label>
	<input type="number" id="taille" name="taille" size="3"  placeholder="156" required/>
    <br>

    <label for="poids"> Poids en kg </label>
	<input type="number" id="poids" name="poids" size="3"  placeholder="70" required/>
    <br>

    <label for="numéro_maillot"> Numéro du maillot </label>
	<input type="int" id="numéro_maillot" name="num_maillot" max="99" min="01" placeholder="32" required/>
    <br>

    <label for="commentaire"> Commentaire sur le joueur : </label>
	<textarea name="commentaire" id="commentaire" >  </textarea>
	<br>

    <label for="statuts"> Statut du joueur </label>
	<select name="statut" id="statuts" required>
		<option value="1">Bléssé</option>
		<option value="2">Absent</option>
		<option value="3">Au repos</option>
		<option value="4">En forme</option>
	</select>
    <br>

    <label for="postejoueur"> Poste du joueur </label>
	<select name="poste" id="postejoueur" required>
		<option value="1">Gardien</option>
		<option value="2">Demi-centre</option>
		<option value="3">Pivot</option>
		<option value="4">Ailier gauche</option>
        <option value="5">Ailier droit</option>
        <option value="6">Arrière gauche</option>
        <option value="7">Arrière droit</option>
	</select>
    <br>

    <input type="submit" name="envoyer" value="Valider">
</form>
</main>
</body>
</html>