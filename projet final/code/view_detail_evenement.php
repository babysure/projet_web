<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Web 3</title>
</head>
<body style="margin:1%">
    <?php include("css_style.html") ;  ?>
    <br><br>

    <h1 class="centrer"> Détail evenement: <?php echo $_SESSION["evenement"]->getTitre() ; ?></h1>

    <br>

    <a class="btn" href="controleur_agenda.php"  style="background-color: #ff6a58 ;float:right;margin-right:15%;margin-left:-15%">Retour</a>

    <br>
    <div class="centrer" >

    <a href="controleur_modifier_evenement.php?id_evenement=<?php echo $_SESSION["evenement"]->getId() ; ?>" class="btn" style="background-color: #aefff9;font-size:150%;" >Modifier</a>
    <a href="controleur_suprimer_evenement.php?id_evenement=<?php echo $_SESSION["evenement"]->getId() ; ?>" class="btn" style="background-color:  #C70039;font-size:150%;" >Suprimer</a>
    
    </div>
    
    <br>
    <br>

    <div class="centrer">

    <div class="row" style="align-items: center;">
    <h2 >ID:</h2>&nbsp;&nbsp;
    <h3 > <?php echo $_SESSION["evenement"]->getId() ;   ?> </h3>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row" style="align-items: center;">
    <h2 >Titre:</h2>&nbsp;&nbsp;
    <h3 >  <?php  echo $_SESSION["evenement"]->getTitre() ; ?> </h3>
    </div>

    <br>

    <div class="row" style="align-items: center;">
    <h2 >Date Début:</h2>&nbsp;&nbsp;
    <h3>  <?php  echo convert_jour( $_SESSION["evenement"]->getDebut()->format("D") ) .' '. $_SESSION["evenement"]->getDebut()->format("d").' '. convert_mois(  $_SESSION["evenement"]->getDebut()->format("M") ) .' '. $_SESSION["evenement"]->getDebut()->format("Y") ."   à ". $_SESSION["evenement"]->getDebut()->format("H"). "h".$_SESSION["evenement"]->getDebut()->format("i") ; ?> </h3>
    </div>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <div class="row" style="align-items: center;">
    <h2>Date Fin:</h2>&nbsp;&nbsp;
    <h3>  <?php  echo convert_jour( $_SESSION["evenement"]->getFin()->format("D") ) .' '. $_SESSION["evenement"]->getFin()->format("d").' '. convert_mois(  $_SESSION["evenement"]->getFin()->format("M") ) .' '. $_SESSION["evenement"]->getFin()->format("Y")."   à ". $_SESSION["evenement"]->getFin()->format("H"). "h".$_SESSION["evenement"]->getFin()->format("i") ; ?> </h3>
    </div>
    
    <br>


    <div class="row" style="align-items: center;">
    <h2 >Categorie:</h2>&nbsp;&nbsp;
    <h3 > <?php echo $_SESSION["evenement"]->getCategorie() ;   ?> </h3>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row" style="align-items: center;">
    <h2 >Statut:</h2>&nbsp;&nbsp;
    <h3 >  <?php  echo $_SESSION["evenement"]->getStatut() ; ?> </h3>
    </div>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row" style="align-items: center;">
    <h2 >Lieu:</h2>&nbsp;&nbsp;
    <h3 >  <?php  echo $_SESSION["evenement"]->getLieu() ; ?> </h3>
    </div>

    <br>

    <div class="row" style="align-items: center;">
    <h2 >Description:</h2>&nbsp;&nbsp;
    <h3 >  <?php  echo $_SESSION["evenement"]->getDescription() ; ?> </h3>
    </div>


    </div>
    
</body>
</html>