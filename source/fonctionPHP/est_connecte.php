<?php
//fonction qui permet de savoir si l'utilisateur est connecté
function est_connecte(): bool {
    //ouvre une session si pas de session n'as était ouverte jusqu'à maintenant
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    //regarde si la variable sous forme de tableau $_SESSION
    // a dans sa case connecte une donné
    //fonction empty renvoie FALSE si la variable existe et n'est pas nul
    //sinon TRUE
    return !empty($_SESSION['connecte']);
}

//function permetant de vérifier que l'utilisateur et connecté et sinon le rediriger vers une autre page.
function utilisateur_connecte(): void {
    if (!est_connecte()){
        header ('location: ./../index.php');
        exit();
    }
}
?>

