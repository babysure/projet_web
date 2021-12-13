<?php 

if(!isset($_SESSION)){
    session_start() ; 
}

include_once("model_categorie.php") ; 



if( isset($_POST) && isset($_POST["titre"]) && isset($_POST["date_debut"]) && isset($_POST["date_debut_heure"]) && isset($_POST["date_debut_minutes"]) && isset($_POST["date_fin"]) && isset($_POST["date_fin_heure"]) && isset($_POST["date_fin_minutes"]) && isset($_POST["lieu"]) && isset($_POST["categorie"]) && isset($_POST["statut"]) && isset($_POST["description"]) && isset($_POST["id"]) ){

    include_once("model_evenement.php"); 

    $date_debut = new DateTime($_POST["date_debut"]."T".$_POST["date_debut_heure"].$_POST["date_debut_minutes"]) ;

    $date_fin =  new DateTime($_POST["date_fin"]."T".$_POST["date_fin_heure"].$_POST["date_fin_minutes"]) ; 


    if( $date_debut > $date_fin ){

        $date_debut = new DateTime($date_fin->format("d-m-Y"));
        $date_debut->modify("-1 day") ; 

    }



    $evenement = new Evenement(trim($_POST["titre"]) , $date_debut , $date_fin , trim($_POST["lieu"]),trim($_POST["categorie"]), trim($_POST["statut"]) , trim($_POST["description"]), trim($_POST["id"]))  ;
 
    $evenement->enregistrer() ;

    include_once("controleur_agenda.php") ; 

}else {
    
    $_SESSION["categories"] = Categorie::getAllCategories() ;
    $_SESSION["evenement"] =  NULL ; 

    include_once("services.php") ; 

    include_once("view_ajouter_evenement.php") ; 

}
