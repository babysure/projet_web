<?php

    // c'est cette vue qui sera appellé par le controller
    // pour fonctionner , elle a besoin de deux paramettres :
    // le dernier jour selectionné :  $jour_selec
    // le dernier mois et année selectionné :  $mois_selec (  string "mm-YYYY" )


?>
&nbsp;

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Projet Web 3</title>
</head>
<body style="margin:1%">
   
<?php include_once('css_style.html'); ?>



    

<h1 style="text-align:center;">  Agenda web 3</h1>
<br>

<a class="btn" href="controleur_ajouter_evenement.php" style="background-color: #bdfeff ;float:right;margin-right:15%;margin-left:-20%">Ajouter événement</a>
<br>
<br>
<br>
    
<div style="width:27%;height:20%;;float: left;">

    <?php include_once("view_agenda_mois.php") ?>

</div>

    
     
<div style="width:72%;height:40%;float: right;">

    <?php include_once("view_agenda_semaine.php") ?>
    
</div>
    
    



</body>
</html>



