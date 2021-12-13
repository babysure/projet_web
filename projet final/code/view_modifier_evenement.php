<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Web 3</title>
</head>



<body>
<?php include_once("css_style.html"); ?>

<h1 class="centrer"> Modifier evenement: <?php echo $_SESSION["evenement"]->getTitre() ; ?></h1>
<br><br>


<a class="btn" href="controleur_detail_evenement.php?id_evenement=<?php echo $_SESSION["evenement"]->getId() ; ;?>"  style="background-color: #ff6a58 ;float:right;margin-right:15%;margin-left:-20%">Retour</a>

<br>

    <?php include_once("view_form_evenement.php") ; ?> 

</body>
</html>