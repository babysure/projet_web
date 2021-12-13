<?php 

if(!isset($_SESSION)){
    session_start() ; 
}

$_SESSION['jour_selec']->modify('+7 day');

if($_SESSION['jour_selec']->format("m-Y") != $_SESSION['mois_selec']->format("m-Y")){

    $_SESSION['mois_selec'] = new DateTime('01-'. $_SESSION['jour_selec']->format("m-Y") ) ; 

}

include_once("controleur_agenda.php") ; 