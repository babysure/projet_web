<?php 


/*
* entrée  string de datetime
* sortie string
*/
function convert_mois($mounth){

    if($mounth == "Jan"){
        return "Janvier" ; 
    }

    if($mounth == "Feb"){
        return "Février" ; 
    }

    if($mounth == "Mar"){
        return "Mars" ; 
    }

    if($mounth == "Apr"){
        return "Avril" ; 
    }

    if($mounth == "May"){
        return "Mai" ; 
    }

    if($mounth == "Jun"){
        return "Juin" ; 
    }

    if($mounth == "Jul"){
        return "Juillet" ; 
    }

    if($mounth == "Aug"){
        return "Août" ; 
    }

    if($mounth == "Sep"){
        return "Septembre" ; 
    }

    if($mounth == "Oct"){
        return "Octobre" ; 
    }

    if($mounth == "Nov"){
        return "Novembre" ; 
    }

    if($mounth == "Dec"){
        return "Décembre" ; 
    }


}

/*
* entrée string de datetime  
*sortie string
*/
function convert_jour($day){

    switch ($day) {
        case 'Mon':
            return "Lundi" ; 
            break;

        case 'Tue':
            return "Mardi" ; 
            break;

        case 'Wed':
            return "Mercredi" ;
            break;

        case 'Thu':
            return "Jeudi" ; 
            break;

        case 'Fri':
            return "Vendredi" ; 
            break;

        case 'Sat':
           return "Samedi" ; 
            break;

        case 'Sun':
            return "Dimanche" ; 
            break;
    
        
    }

}

/*
* entrée string de datetime  
*sortie string
*/
function convert_jour_court($day){

    switch ($day) {
        case 'Mon':
            return "Lun" ; 
            break;

        case 'Tue':
            return "Mar" ; 
            break;

        case 'Wed':
            return "Mer" ;
            break;

        case 'Thu':
            return "Jeu" ; 
            break;

        case 'Fri':
            return "Ven" ; 
            break;

        case 'Sat':
           return "Sam" ; 
            break;

        case 'Sun':
            return "Dim" ; 
            break;
    
        
    }

}




// entrée date :  DateTime
// sorie DateTime
function trouver_premier_jour_mois($date){
    return (new DateTime('01-'.$date->format("m-Y") ) ) ;
}



// entrée date :  DateTime
// sorie DateTime
function trouver_dernier_jour_mois($date){

    $jour = trouver_premier_jour_mois($date);

    $jour->modify('+1 month') ; 

    $jour->modify('-1 day') ;
    
    return $jour ; 
}

// entrée date :  DateTime
// sortie $jour_vide[ "vide_avant" => nb_vide_avant_premier_jour_du_mois : int  , 
//                     "vide_apres" => nb_vide_après_premier_jour_du_mois : int ]
function trouver_nb_jours_vide($date){
    
    $premier_jour_du_mois = trouver_premier_jour_mois($date) ;

    $jour_vide = array() ; 
    
    switch ( $premier_jour_du_mois->format("D") ) {
        case 'Mon':
            $jour_vide["vide_avant"] = 0 ;
            break;

        case 'Tue':
            $jour_vide["vide_avant"] = 1 ;
            break;

        case 'Wed':
            $jour_vide["vide_avant"] = 2 ;
            break;

        case 'Thu':
            $jour_vide["vide_avant"] = 3 ;
            break;

        case 'Fri':
            $jour_vide["vide_avant"] = 4 ;
            break;

        case 'Sat':
            $jour_vide["vide_avant"] = 5 ; 
            break;

        case 'Sun':
            $jour_vide["vide_avant"] = 6 ; 
            break;
        
    }


    $dernier_jour_du_mois = trouver_dernier_jour_mois($date) ; 

     



    switch ( $dernier_jour_du_mois->format("D") ) {
        case 'Mon':
            $jour_vide["vide_apres"] = 6 ;
            break;

        case 'Tue':
            $jour_vide["vide_apres"] = 5 ;
            break;

        case 'Wed':
            $jour_vide["vide_apres"] = 4 ;
            break;

        case 'Thu':
            $jour_vide["vide_apres"] = 3 ;
            break;

        case 'Fri':
            $jour_vide["vide_apres"] = 2 ;
            break;

        case 'Sat':
            $jour_vide["vide_apres"] = 1 ; 
            break;

        case 'Sun':
            $jour_vide["vide_apres"] = 0 ; 
            break;
        
    }

    return $jour_vide ;

}

// entrée : $_SESSION['jour_selec'] : DateTime
// sortie : array( 
// 0 => J-3 : DateTime ,
// 1 => J-2 : DateTime ,
// 2 => J-1 : DateTime ,
// 3 => $_SESSION['jour_selec'] : DateTime ,
// 4 => J+1 : DateTime  ,
// 5 => J+2 : DateTime ,
// 6 => J+3 : DateTime   )
function trouver_jours_semaine_relative($jour){

    $jour =  new DateTime( $jour->format("d-m-Y") ) ; 

    $jour->modify('-3 day') ;
    
    $tab =  array() ; 

    for ($i=0; $i < 7 ; $i++) { 
       
        $tab[$i]= new DateTime( $jour->format("d-m-Y") ) ;

        $jour->modify('+1 day') ;
    }

    return $tab ; 

}

// entrée :  $jour $_SESSION['jour_selec'] :  DateTime , $event_list $_SESSION['config_calendrier']["liste_evenements"]
// sortie :  array ( 0 => array ( colspan 1er ligne : int , nb_vide_avant_event sur 1er ligne : int , nb_vide_apres_event sur 1er ligne:  int )  , 1=> array ( colspan 2e ligne : int , nb_vide_avant_event sur 2e ligne : int , nb_vide_apres_event sur 2e ligne:  int )  ,  etc ...  )
function avoir_config_agenda_semaine($jour ,  $event_list){

    $jours_semaine_relative = trouver_jours_semaine_relative($jour) ;



    $debut_semaine = new DateTime($jours_semaine_relative[0]->format("d-m-Y") ); 

    $fin_semaine = new DateTime( $jours_semaine_relative[6]->format("d-m-Y") );

    $super_tab =  array() ; 

    for ($i=0; $i < count($event_list) ; $i++) { 
        
        $tab = array(0, 0, 0) ;
        $debut_current_event = new DateTime( $event_list[$i]->getDebut()->format("d-m-Y") ) ;
        $fin_current_event =  new DateTime( $event_list[$i]->getFin()->format("d-m-Y") );
        
        $nb_jours_intervale_avant = (int) $debut_semaine->diff( $debut_current_event )->format('%R%a') ;
        $nb_jours_intervale_fin = (int) $fin_current_event->diff( $fin_semaine )->format('%R%a') ;


        $date_origine = new DateTime( $debut_semaine->format("d-m-Y") ) ;
        $date_target = new DateTime($fin_semaine->format("d-m-Y"));

        if(  $nb_jours_intervale_avant > 0  ){

            $tab[1] = $nb_jours_intervale_avant ;

            $date_origine->modify('+'.$nb_jours_intervale_avant.' day');

        }

        if( $nb_jours_intervale_fin > 0 ){

            $date_target->modify('-'.$nb_jours_intervale_fin.' day');
            
        }

        $tab[0] = (int) $date_origine->diff($date_target)->format('%R%a') +1;

        $tab[2] = 7-($tab[0]+ $tab[1]) ;

        $super_tab[] = $tab ;

    }

    return $super_tab ; 

}



