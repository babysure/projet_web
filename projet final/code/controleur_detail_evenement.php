<?php 

if(!isset($_SESSION)){
    session_start() ; 
}

if( (isset($_GET) && isset($_GET["id_evenement"])) ){
    
    include_once("model_evenement.php") ;

    $_SESSION["evenement"] = Evenement::findById($_GET["id_evenement"]) ;

    include_once("services.php") ; 

    include_once("view_detail_evenement.php") ;
     
}else if( isset($_SESSION["evenement"]) && (!empty($_SESSION["evenement"])) ){


    include_once("services.php") ; 

    $_SESSION["evenement"] = unserialize(serialize($_SESSION["evenement"]));

    // on actualise l'objet evenement 
    $_SESSION["evenement"] = Evenement::findById($_SESSION["evenement"]->getId()) ;
    
    include_once("view_detail_evenement.php") ;



}  else {

    include_once("controleur_agenda.php") ; 
}
