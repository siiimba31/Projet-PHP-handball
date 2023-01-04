<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($title)) {
            echo $title;
            } else {
            echo 'Handball';
            } 
        ?>
    </title>
    <link rel="stylesheet" href="../source/style/style.css">
</head>
<body>
    <header id="entete">
        <nav id="navmenu">
            <ul id="ulmenu">
                <li class="limenu"><a href=accueil.php>ACCUEIL</a></li>
                <li class="limenu"><a href=presentation_BUT.html>JOUEURS</a></li>
                <li class="limenu"><a href=Competence.html>MATCH</a></li>
                <li class="limenu"><a href=contact.html>STATISTIQUE</a></li>
                <li class="limenu"><a href=deconnexion.php>DECONNEXION</a></li>
            </ul>
            <img id="logo" src="../source/img/logo.png" alt="logo équipe">
        </nav>
        
    </header>


