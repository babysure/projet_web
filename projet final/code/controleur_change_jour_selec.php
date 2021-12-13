<?php 

if(!isset($_SESSION)){
    session_start() ; 
}

if(isset($_GET) && isset($_GET["new_jour_selec"]) ){
    
    $_SESSION['jour_selec'] =  new DateTime($_GET["new_jour_selec"])  ;
}


include_once("controleur_agenda.php") ; 


