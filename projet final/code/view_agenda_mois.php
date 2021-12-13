  
<style>


/* Calendar Styles */
.calendar-month {
	width: 90%;
	margin: 0 auto;
	padding: 20px;
	background: #fff;
	list-style-type: none;
}

.calendar-month .week {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
}

.calendar-month .week__header {
	order: 1;
	background: #fff;
	border-right: 1px solid #e8e8e8;
	text-align: center;
	padding: 5px;
	text-transform: uppercase;
	color: #333;
	letter-spacing: 2px;
	width: 14.2857%;
	box-sizing: border-box;
}

.calendar-month .week__header:nth-child(7) {
	border-right: 0;
}

.calendar-month .week__header:first-letter {
	font-size: 12px;
}

@media (max-width: 767px) {
	.calendar-month .week__header {
		padding: 10px 0;
		font-size: 0;
	}
}

.calendar-month .days {
	list-style-type: none;
	margin: 0;
	padding: 0;
	display: flex;
	width: 100%;
}

.calendar-month .day {
	position: relative;
	order: 1;
	width: 14.2857%;
	background: #fff;
	border-right: 1px solid #e8e8e8;
	border-top: 1px solid #e8e8e8;
	transition: 0.5s;
	box-sizing: border-box;
}

.calendar-month .day:nth-child(7n + 7) {
	border-left: none;
}

.calendar-month .day:nth-child(7n + 7) {
	border-right: none;
}

.calendar-month .day:after {
      /* Create responsive square div */
	content: "";
	display: block;
	padding-bottom: 100%;
}

.calendar-month .day:hover {
	background: #eee;
}

.calendar-month .day__number {
	position: absolute;
	right: 20px;
	top: 20px;
	margin: 0;
}

@media (max-width: 767px) {
	.calendar-month .day__number {
		right: 5px;
		top: 5px;
	}
}

.calendar-month .day--empty {
	background: #f8f8f8;
}

.calendar-month .day--empty:hover {
	cursor: default;
	background: #f8f8f8;
}

.calendar-month a {
	display: block;
	width: 100%;
	height: 100%;
}



a {
	color: #333;
	text-decoration: none;
}

#selected_day {

  background-color :  #5d6d7e  ;
}

.calendrier_entete {
	display: flex;
	position: relative;
	justify-content: space-between;
}

</style>

<ol class="calendar-month">
  <div class="calendrier_entete"  >  
    <div>   <a href="controleur_retirer_mois.php"><?php include("img_arrow_double_left.svg") ?>  </a>    </div>
    
    <div> <h3> <?php echo convert_mois( $_SESSION['mois_selec']->format("M") ) . ' '. $_SESSION['mois_selec']->format("Y") ; ?></h3> </div>
    
    <div>  <a href="controleur_ajouter_mois.php"><?php include("img_arrow_double_right.svg") ?> </a>   </div>

  </div>
 
    <br>
  <li class="week">
 
    <ol class="days">
      <div class="week__header" style="font-size:90%">Lun</div>
      <div class="week__header" style="font-size:90%" >Mar</div>
      <div class="week__header" style="font-size:90%">Mer</div>
      <div class="week__header" style="font-size:90%">Jeu</div>
      <div class="week__header" style="font-size:90%">Ven</div>
      <div class="week__header" style="font-size:90%">Sam</div>
      <div class="week__header" style="font-size:90%">Dim</div>
    </ol>
  </li>
  <li class="week">
    <ol class="days">
      
    
      <?php 
        
        for ($i=0; $i <  $_SESSION['config_calendrier']["vide_avant"]  ; $i++) { 
          
          echo  "<li class='day day--empty'></li>" ; 
          
        }

                
        for ($i=1; $i <=  $_SESSION['config_calendrier']["dernier_jour_du_mois"] ; $i++) { 
			
			// date_du_jour = string  dd-mm-yyyy
			if($i < 10){

				$date_du_jour = '0'.$i.'-'.$_SESSION['mois_selec']->format("m-Y") ;

			}else {

				$date_du_jour = $i.'-'.$_SESSION['mois_selec']->format("m-Y") ;
			}
			


          if( (new DateTime($date_du_jour)  )->format('D') == "Mon"){
            
            ?>
              </ol>
            </li>
            <li class="week">
              <ol class="days">
            
            <?php 
          }
          
          ?> 

           <li class="day">
              <a href="controleur_change_jour_selec.php?new_jour_selec=<?php echo $date_du_jour ; ?>" <?php if($_SESSION['jour_selec']->format("d-m-Y") ==  $date_du_jour  ){  echo " style='background-color:#5c99da;'" ;  }elseif($date_du_jour == (new DateTime())->format("d-m-Y") ){ echo " style='background-color:#f3df97;'" ; } ?> >
                <span class="day__number"> <?php echo $i ;  ?> </span>
              </a>
          </li>
          
        <?php
        }
       
        
        for ($i=0; $i < $_SESSION['config_calendrier']["vide_apres"] ; $i++) { 
         
          echo "<li class='day day--empty'></li>" ;
      
        }
        
      ?>
      
    </ol>
  </li>
</ol>