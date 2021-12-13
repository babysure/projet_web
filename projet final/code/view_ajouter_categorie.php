<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Web 3</title>
</head>
<body  style="margin:1%;text-align: center;" >
 
<?php include("css_style.html") ;  ?>
    <br><br>

    <h1 class="centrer">  Ajouter une catégorie </h1>
    <br><br><br>
    <form action="controleur_ajouter_categorie.php" method="post" >

        
        
        <label for="categorie">Categorie</label>
        <input type="text" name="categorie" id="categorie" >
        
        &nbsp;&nbsp;&nbsp;&nbsp;

        <button class="btn" style="background-color: #aaff95;" type="submit">Ajouter</button>
       
    
    </form>

</body>
</html>