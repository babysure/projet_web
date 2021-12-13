<style>
table {
  font-family: sans-serif;
  width: 100%;
  border-spacing: 0;
  border-collapse: separate;
  table-layout: fixed;
  margin-bottom: 50px;
}
table thead tr th {
  background: #626e7e;
  color: #d1d5db;
  padding: 0.5em;
  overflow: hidden;
}
table thead tr th:first-child {
  border-radius: 3px 0 0 0;
}
table thead tr th:last-child {
  border-radius: 0 3px  0 0;
}
table thead tr th .day {
  display: block;
  font-size: 1.2em;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  margin: 0 auto 5px;
  padding: 5px;
  line-height: 1.8;
}
table thead tr th /*.day*/.active {
  background: #d1d5db;
  color: #626e7e;
}
table thead tr th .short {
  display: none;
}
table thead tr th i {
  vertical-align: middle;
  font-size: 2em;
}
table tbody tr {
  background: #d1d5db;
}
table tbody tr:nth-child(odd) {
  background: #c8cdd4;
}

table tbody tr td {
  text-align: center;
  vertical-align: middle;
  border-left: 1px solid #626e7e;
  position: relative;
  height: 35px;
  cursor: pointer;
}
table tbody tr td:last-child {
  border-right: 1px solid #626e7e;
}


@media (max-width: 60em) {
  table thead tr th .long {
    display: none;
  }
  table thead tr th .short {
    display: block;
  }
 
}
@media (max-width: 27em) {
  table thead tr th {
    font-size: 65%;
  }
  table thead tr th .day {
    display: block;
    font-size: 1.2em;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    margin: 0 auto 5px;
    padding: 5px;
  }
  table thead tr th /*.day*/ .active {
    background: #d1d5db;
    color: #626e7e;
  }
  

}

</style>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<table>
  <thead>
    <tr>
    
    <?php 
        
      for ($i=0; $i < 7 ; $i++) { 
        
          if($i != 3){
            ?>
            <th>
             
            <?php if($i==0){ ?> <span style="float:left;" > <a href="controleur_retirer_semaine.php"> <?php  include("img_arrow_double_left.svg"); ?>  </a> </span> <?php } ?> 
            <?php if($i==6){ ?> <span style="float:right;" > <a href="controleur_ajouter_semaine.php"> <?php include("img_arrow_double_right.svg");?></a> </span> <?php } ?>
            
              <span class="long"> <?php echo convert_jour( $_SESSION['config_calendrier']["jours_semaine_relative"][$i]->format("D") ) ; ?></span>
              <span class="short"> <?php echo convert_jour_court($_SESSION['config_calendrier']["jours_semaine_relative"][$i]->format("D")) ; ?></span>
              <span class="day"> <?php echo $_SESSION['config_calendrier']["jours_semaine_relative"][$i]->format("d") ; ?> </span>
             
            </th>
            
    <?php }else {  ?>
           
              <th>
                <span class="day long active" style="width:99%;border-radius:50px">  <?php echo convert_jour( $_SESSION['config_calendrier']["jours_semaine_relative"][$i]->format("D") ) ; ?> </span>
                <span class="day short active" style="width:99%;border-radius:50px"> <?php echo convert_jour_court($_SESSION['config_calendrier']["jours_semaine_relative"][$i]->format("D")) ; ?> </span>
                <span class="day active" style="width:100%;height:100%;border-radius:50px;font-size:100%"> <?php echo $_SESSION['config_calendrier']["jours_semaine_relative"][$i]->format("d") .' '. convert_mois( $_SESSION['config_calendrier']["jours_semaine_relative"][$i]->format("M") ) .' '. $_SESSION['config_calendrier']["jours_semaine_relative"][$i]->format("Y") ; ?> </span>
              </th>

            <?php 
          }
      }
    ?>
    
    </tr>
  </thead>
  <tbody>

      <?php 
            
          foreach($_SESSION['config_calendrier']["liste_evenements"] as $key => $event ){ 
         
            echo "<tr>" ;
    
          
          for ($k=0; $k < $_SESSION['config_calendrier']["config_affichage_corps_agenda_semaine"][$key][1] ; $k++) { 
            
            echo "<td></td>" ; 

          }
          ?>
          

          

          <td  colspan="<?php echo $_SESSION['config_calendrier']["config_affichage_corps_agenda_semaine"][$key][0] ;?>">

       
        <a href="controleur_detail_evenement.php?id_evenement=<?php echo $event->getId() ; ?>" style="height:100%;width:100%;background-color:<?php if($event->getIdStatut()== 1){ echo "#dfdfdf"; }elseif ( $event->getIdStatut()== 2 ) { echo  "#ffb76f"  ;  }else{ echo "#fff86f" ; }?>;"  >
      
      
        <div style="height:100%;background-color:<?php if($event->getIdStatut()== 1){ echo "#dfdfdf"; }elseif ( $event->getIdStatut()== 2 ) { echo  "#ffb76f"  ;  }else{ echo "#fff86f" ; }?>;">
             
          <?php  echo $event->getTitre() ; ?>
       
        </div>  
      
      
        </a>

         
          
          
        
        </td>

          

          <?php

            

            for ($k=0; $k < $_SESSION['config_calendrier']["config_affichage_corps_agenda_semaine"][$key][2] ; $k++) { 
                        
              echo "<td></td>" ; 
              
            }
          

           echo "</tr>" ; 

        

          if( ($key == $_SESSION['config_calendrier']["nb_events"]  -1 ) && ($key < 9 ) ){

            for ($j=1; $j <= 9 - $key ; $j++) { 
              
              ?>
      
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
    
            <?php 

            }


          }

        }

        if(!$_SESSION['config_calendrier']["nb_events"]){

          for ($i=0; $i < 10 ; $i++) { 
            
              ?>

            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <?php 

          }

        }

      ?>

    

    
  </tbody>
</table>