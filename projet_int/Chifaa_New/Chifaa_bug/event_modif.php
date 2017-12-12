<?php 
  if (!session_id()) session_start();
  ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html>
  <head>
    <?php include 'templates/includes/$head.html' ?>
    <style>
            #myInput {
                background-image: url('/css/searchicon.png'); /* Add a search icon to input */
                background-position: 10px 12px; /* Position the search icon */
                background-repeat: no-repeat; /* Do not repeat the icon image */
                width: 100%; /* Full-width */
                font-size: 16px; /* Increase font-size */
                padding: 12px 20px 12px 40px; /* Add some padding */
                border: 1px solid #ddd; /* Add a grey border */
                margin-bottom: 12px; /* Add some space below the input */
            }
        </style>
  </head>

  <body>
    
    <!-- bar de menu -->
    <div class="navigation">
      <?php include 'templates/includes/$navigation.php' ?>
    </div>
		  </br>
          </br>
          </br>
          </br>
    <div class="row">
        <div class="col-lg-12">
           <div class="container">
              <div class="row">          
               </br>
               <a href="evenement_admin.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-calendar"></span>Évènements</a>
               </div>        
           </div>
       </div>
   </div>
    <div>
      <h1>&Eacute;v&eacute;nements</h1>
    </div>
    
    <div class="form_page">

       <form action="evenement_admin.php" method="post">
        <?php 
          echo"
            <input type='text' name='titre_mo' size='50' placeholder='Titre de l&#39;événement' class='col-md-12 form-control' value='".str_replace("'","&#39;",$_POST["title_event"])."'/>
            <br/> 

            <input size='20' type='date' name='date_mo' placeholder='Date' class='col-md-8 form-control' value='".$_POST["date_event"]."'/>
            <input size='20' type='time' name='heure_mo' placeholder='Heure'  class='col-md-4 form-control' value='".$_POST["heure_event"]."'/>

            <br/>
            <input type='text' name='lieu_mo' size='50' placeholder='Lieu' class='col-md-12 form-control' value='".str_replace("'","&#39;",$_POST["lieu_event"])."'/>
            <br/>
            <br/>

            <textarea name='description_mo' size='50'  placeholder='Description de l&#39;événement' class='form-control' rows ='5'>".str_replace("'","&#39;",$_POST["obj_event"])."</textarea>
            <br/>
            <input type='hidden' name='id_event' value='".$_POST["id_event"]."'/>"
        ?>
        <input type="submit" name="modif" value="Valider" class="btn btn-lg btn-primary"/>
    </div>
    
    <?php
      if(isset($_POST["val"])){
        $titre = $_POST["titre"];
        $date = $_POST["date"];
        $time = $_POST["heure"];
        $lieu = $_POST["lieu"];
        $description = $_POST["description"];
        
        $e = new Evenement();
        $e -> setSujet($titre);
        $e -> setDat($date);
        $e -> setTim($time);
        $e -> setLieu($lieu);
        $e -> setMsg($description);
        $e -> AjouterEvenement();
      }
      
    ?>

  </body>
  
</html>