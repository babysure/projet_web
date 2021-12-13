<?php 

if(!isset($_SESSION)){
    session_start() ; 
}

if(isset($_POST)&& isset($_POST["categorie"])  ){

    include_once("model_categorie.php"); 


    $categorie   = new Categorie($_POST["categorie"]);

    $categorie->enregistrer(); 
        
    include("controleur_modifier_evenement.php") ;

}else {

    include("view_ajouter_categorie.php") ; 

}