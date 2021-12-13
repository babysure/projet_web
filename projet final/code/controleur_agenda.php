<?php 

    // pour fonctionner , le controleur agenda a besoin de deux parametres :
    // le dernier jour selectionné :  $_SESSION['jour_selec'] :  DateTime
    // le dernier mois et année selectionné pour le calendrier de gauche :  $_SESSION['mois_selec'] :  DateTime 
    // semaine relative = J-3 , J-2 , J-1 , J , J+1 , J+2 , J+3
    // pour des raisons de maintenabilité et de rapidité de débeguage,  j'ai préféré mettre les traitements "complexe" dans des fonctions à part
    
    include_once("model_evenement.php"); 
    
    include_once("services.php") ; 


    if(!isset($_SESSION)){
        session_start() ; 
    }

    if(!isset($_SESSION['jour_selec'])){
        $_SESSION['jour_selec'] =  new DateTime() ;
    }

    if(!isset($_SESSION['mois_selec'])){
        $_SESSION['mois_selec'] =  new DateTime("01-".$_SESSION['jour_selec']->format("m-Y")) ;
    }

    $_SESSION['config_calendrier']= trouver_nb_jours_vide($_SESSION['mois_selec']);
    
    $_SESSION['config_calendrier']["dernier_jour_du_mois"] = (int) trouver_dernier_jour_mois($_SESSION['mois_selec'])-> format("d");
    
    $_SESSION['config_calendrier']["jours_semaine_relative"] = trouver_jours_semaine_relative($_SESSION['jour_selec']);

    $_SESSION['config_calendrier']["liste_evenements"] = Evenement::searchEventsOfWeek($_SESSION['jour_selec']) ;
    
    $_SESSION['config_calendrier']["nb_events"] = count($_SESSION['config_calendrier']["liste_evenements"]) ;
    
    $_SESSION['config_calendrier']["config_affichage_corps_agenda_semaine"] = avoir_config_agenda_semaine($_SESSION['jour_selec'] , $_SESSION['config_calendrier']["liste_evenements"]) ;

     
    include_once('view_agenda_general.php') ; 