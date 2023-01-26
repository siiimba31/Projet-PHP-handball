<?php 
// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='ModifierJoueur';
require 'header.php';
?>
<main>
<form action="../source/fonctionPHP/ajoutmatch.php" enctype = "multipart/form-data" method="post">

    <label for="nomadv"> Adversaire </label>
	<input type="text" id="nomadv" name="nomadv" maxlenght="20" placeholder="handball club" required/>
    <br>

    <label for="lieum"> Lieu du match </label>
	<select name="lieum" id="lieum" required>
		<option value="Domicile"> Domicile </option>
		<option value="Exterieur"> Exterieur </option>
	</select>

    <label for="datematch"> Date du match </label>
    <br>
	<input type="date" id="datematch" name="datematch" required/>
    <br>

    <label for="heurematch"> Heure du match </label>
    <br>
	<input type="time" id="heurematch" name="heurematch" required/>
    <br>

    <input type="submit" name="envoyer" value="Valider">
</form>
</main>
<?php 
require 'footer.php';
?>