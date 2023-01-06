<?php
$erreur = null;
if (!empty($_POST['pseudo']))
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="source/style/style.css" media="screen" type="text/css" />
    </head>
    <body id="connexion">
        <div id="container">
             <form action="./source/fonctionPHP/verification.php" method="POST">
                <h1>Connexion</h1>
    
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                    <input type="submit" id='submit' value='LOGIN' >
                <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                ?>
            </form>
        </div>
    </body>
</html>
