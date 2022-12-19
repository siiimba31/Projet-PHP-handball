<?php 
require './../source/fonctionPHP/est_connecte.php';
if (!est_connecte()){
    header ('location: ./../index.php');
    exit();
}


$title='Accueil';
require 'header.php';
?>