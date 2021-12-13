<?php 

if(!isset($_SESSION)){
    session_start() ; 
}

$_SESSION['mois_selec']->modify('+1 month');

include_once("controleur_agenda.php") ; 

