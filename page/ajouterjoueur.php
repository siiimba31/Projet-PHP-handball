<?php 

require './../source/fonctionPHP/est_connecte.php';
utilisateur_connecte();

// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title="Ajout d'un joueur";
require 'header.php';
?>

<form action="../source/fonction/........" method="post">

    <label for="nom_identifiant"> Numéro de license </label>
	<input type="text" id="nom_identifiant" name="num_license" size="13" placeholder="0123456789101"/>
    <br>

    <label for="nom_joueur"> Nom du joueur </label>
	<input type="text" id="nom_joueur" name="nom" maxlenght="30" placeholder="Dupond"/>
    <br>

    <label for="prenom_joueur"> Prénom du joueur </label>
	<input type="text" id="prenom_joueur" name="prenom" maxlenght="30" placeholder="Marie"/>
    <br>

    <label for="date_de_naissance"> Date de naissance </label>
    <br>
	<input type="date" id="date_de_naissance" name="datenaissance" />
    <br>

    <label for="photo_joueur"> Photo du joueur </label>
	<input type="file" id="photo_joueur" accept="image/png, image/jpeg" name="photo"/>
    <br>

    <label for="numéro_maillot"> Numéro du maillot </label>
	<input type="int" id="numéro_maillot" name="num_maillot" max="99" min="01" placeholder="32"/>
    <br>

    <label for="num_telephone"> Numéro de téléphone </label>
    <input type="text" id="num_telephone" name="telephone" size="10" placeholder="0611223344"/>
    <br>

    <label for="statuts"> Statut du joueur </label>
	<select name="statut" id="statuts">
		<option value="1">Bléssé</option>
		<option value="2">Absent</option>
		<option value="3">Au repos</option>
		<option value="4">En forme</option>
	</select>

    <label for="postejoueur"> Poste du joueur </label>
	<select name="poste" id="postejoueur">
		<option value="1">Gardien</option>
		<option value="2">Demi-centre</option>
		<option value="3">Pivot</option>
		<option value="4">Ailier gauche</option>
        <option value="5">Ailier droit</option>
        <option value="6">Arrière gauche</option>
        <option value="7">Arrière droit</option>
	</select>

</form>