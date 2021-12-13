<?php 

// ce code à été écrit par ABISUR Boris ^-^
 
// pour fonctionner , le controleur agenda a besoin de deux parametres :
// le dernier jour selectionné :  $_SESSION['jour_selec'] :  DateTime
// le dernier mois et année selectionné pour le calendrier de gauche :  $_SESSION['mois_selec'] :  DateTime 
// semaine relative = J-3 , J-2 , J-1 , J , J+1 , J+2 , J+3
session_start() ; 


     
$_SESSION['jour_selec']=(new \DateTime() ); 
$_SESSION['mois_selec']=(new \DateTime('01-'.$_SESSION['jour_selec']->format("m-Y") ) );



include_once('controleur_agenda.php'); 

    
