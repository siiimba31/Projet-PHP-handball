<?php 

// on appelle la page header qui vas nous afficher l'entete 
//et le le nom de notre page avec la variable $title
$title='Accueil';
require 'header.php';
?>

<main>
    <br>
    <div>
        <a class="button-75" href="ajouterjoueur.php">Ajouter joueur</a>
    </div>
    <br>
    <div>
        <a class="button-75" href="ajoutermatch.php">Ajouter match</a>
    </div>
</main>

<?php 
require 'footer.php';
?>