<style>

[type="date"] {
  background:#fff url("./img_calendar_icon.webp")  97% 50% no-repeat ;
}
[type="date"]::-webkit-inner-spin-button {
  display: none;
}
[type="date"]::-webkit-calendar-picker-indicator {
  opacity: 0;
}

/* custom styles */
body {
  padding: 4em;
  background: #e5e5e5;
  font: 13px/1.4 Geneva, 'Lucida Sans', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
}
label {
  display: block;
}
input {
  border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 190px;
}

</style>


<form action="<?php if($_SESSION["evenement"]){ echo "controleur_modifier_evenement.php" ;}else{  echo "controleur_ajouter_evenement.php" ;} ?>" method="post" class="centrer">

  <input type="hidden" name="id" value="<?php if($_SESSION["evenement"]){ echo $_SESSION["evenement"]->getId() ;  } ?>">


<label for="titre_evenement">Titre</label>
<input type="text" name="titre" id="titre_evenement" value="<?php if($_SESSION["evenement"]){ echo $_SESSION["evenement"]->getTitre() ;  } ?>" >
<br><br>

<div  class="row">

<label for="date_debut">Date de début</label>
<input type="date" name="date_debut" id="date_debut" value="<?php if($_SESSION["evenement"]){ echo $_SESSION["evenement"]->getDebut()->format("Y-m-d") ;  } ?>" >

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="custom-select" style="width:20%;">
  <select  name="date_debut_heure">
  <option value="">heures</option>

  <?php 
    for ($i=0; $i < 24; $i++) { 
        
        if($i < 10){

           ?> <option value="0<?php echo $i;?>" <?php if( $_SESSION["evenement"]  && $_SESSION["evenement"]->getDebut()->format("H") ==  ("0".$i ) ){ echo "selected"  ;} ?> ><?php echo "0".$i ;?></option>  <?php
        }else {

            ?> <option value="<?php echo $i;?>"  <?php if($_SESSION["evenement"] && $_SESSION["evenement"]->getDebut()->format("H") ==  $i  ){ echo "selected"  ;} ?>   ><?php echo $i ;?></option>  <?php

        }

    }
  ?>
   
  </select>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span style="font-size:3em;margin-top:-0.2em;">:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="custom-select" style="width:20%;">
  <select  name="date_debut_minutes">
    <option value="">minutes</option>
    
    <?php 
    for ($i=0; $i < 60; $i++) { 
        
        if($i < 10){

           ?> <option value="0<?php echo $i;?>"  <?php if($_SESSION["evenement"] && $_SESSION["evenement"]->getDebut()->format("i") ==  ("0".$i ) ){ echo "selected"  ;} ?> ><?php echo "0".$i ;?></option>  <?php
        }else {

            ?> <option value="<?php echo $i;?>"   <?php if($_SESSION["evenement"] && $_SESSION["evenement"]->getDebut()->format("i") ==  $i  ){ echo "selected"  ;} ?>  ><?php echo $i ;?></option>  <?php

        }

    }
  ?>


  </select>
</div>


</div>

<br><br> <br> <br>
<div class="row" >

    
<label for="date_fin">Date de fin</label>
<input type="date" name="date_fin" id="date_fin"    value="<?php if($_SESSION["evenement"]){ echo $_SESSION["evenement"]->getFin()->format("Y-m-d") ;  } ?>">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="custom-select" style="width:20%;">
  <select name="date_fin_heure" >
  <option value="">heures</option>

  <?php 
    for ($i=0; $i < 24; $i++) { 
        
        if($i < 10){

           ?> <option value="0<?php echo $i;?>"  <?php if($_SESSION["evenement"]&& $_SESSION["evenement"]->getFin()->format("H") ==  ("0".$i ) ){ echo "selected"  ;} ?> ><?php echo "0".$i ;?></option>  <?php
        }else {

            ?> <option value="<?php echo $i;?>"   <?php if($_SESSION["evenement"]&& $_SESSION["evenement"]->getFin()->format("H") ==  $i  ){ echo "selected"  ;} ?> ><?php echo $i ;?></option>  <?php

        }

    }
  ?>
   
  </select>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span style="font-size:3em;margin-top:-0.2em;">:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="custom-select" style="width:20%;">
  <select name="date_fin_minutes" >
    <option value="">minutes</option>
    
    <?php 
    for ($i=0; $i < 60; $i++) { 
        
        if($i < 10){

           ?> <option value="0<?php echo $i;?>" <?php if($_SESSION["evenement"]&& $_SESSION["evenement"]->getFin()->format("i") == ( "0".$i ) ){ echo "selected"  ;} ?> ><?php echo "0".$i ;?></option>  <?php
        }else {

            ?> <option value="<?php echo $i;?>"  <?php if($_SESSION["evenement"]&& $_SESSION["evenement"]->getFin()->format("i ") ==  $i  ){ echo "selected"  ;} ?> ><?php echo $i ;?></option>  <?php

        }

    }
  ?>


  </select>
    
</div>
</div>
<br><br> <br> <br>


<div  class="row">


    
<label for="lieu">Lieu</label>
<input type="text" name="lieu" id="lieu"    value="<?php if($_SESSION["evenement"]){ echo $_SESSION["evenement"]->getLieu() ;  } ?>">


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div >
<label for="categorie">Categorie ( <a href="controleur_ajouter_categorie.php" style="text-decoration: underline;">ajouter une categorie</a>  )</label>
<div class="custom-select" style="width:90px;" >

  <select  name="categorie" id="categorie">
  
  <option value="">categorie</option>


  <?php 
    foreach ($_SESSION["categories"] as $categorie) {
        
        ?>

        <option value="<?php echo $categorie->getId() ?>" <?php if( $_SESSION["evenement"] && ( $categorie->getId() == $_SESSION["evenement"]->getIdCategorie() ) ){  echo "selected"  ;  } ?>><?php echo $categorie->getDescriptif() ?></option>

        <?php
    }
  ?>
   
  </select>
</div>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div>
<label for="statut">Statut</label>
<div class="custom-select" style="width:90px;">
  <select  name="statut" id="statut" >
    <option value="">statut</option>

    <option value="1" <?php  if( $_SESSION["evenement"] &&  ($_SESSION["evenement"]->getIdStatut() == "1")){  echo "selected"  ; }   ?> >Standard</option>
    <option value="2" <?php  if( $_SESSION["evenement"] &&($_SESSION["evenement"]->getIdStatut() == "2")){  echo "selected"  ; }   ?>  >Privé</option>
    <option value="3" <?php  if( $_SESSION["evenement"] && ($_SESSION["evenement"]->getIdStatut() == "3")){  echo "selected"  ; }   ?>  >Public</option>
    
  </select>
</div>
</div>


</div>




<br>
<br>

    

<label for="description_evenement">Description</label>
<textarea name="description" id="description_evenement"  > <?php if($_SESSION["evenement"]){  echo $_SESSION["evenement"]->getDescription() ;  } ?> </textarea>

<br>
<br>


<button  class="btn" type="submit" style="background-color: #aaff95 ;">Enregistrer</button>


</form>

<br>


<style>

     /* The container must be positioned relative: */
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
} 


</style>


<script>

var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);


</script>
