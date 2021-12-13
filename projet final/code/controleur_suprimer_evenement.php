<?php

if(!isset($_SESSION)){
    session_start() ; 
}


if(isset($_GET) && isset($_GET["id_evenement"])  ){

    include_once("model_evenement.php") ; 

    $evenement = Evenement::findById($_GET["id_evenement"]) ;


    $evenement->suprimer() ; 
      
    if(isset($_SESSION["evenement"])){

        $_SESSION["evenement"] =  NULL ;

    }
}

include_once("controleur_agenda.php") ; 
