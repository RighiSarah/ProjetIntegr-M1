<?php 
  if (!session_id()) session_start(); 
?>

<!DOCTYPE HTML>
<html>
  <head>
    <?php include 'templates/includes/$head.html' ?>
  </head>

  <body>
    
    <!-- barre de menu -->
    <div class="navigation">
      <?php include 'templates/includes/$navigation.php' ?>
    </div>

    
    <div class="title_page">
      <h1>Modification d'&eacute;v&eacute;nements</h1>
    </div>

    <div class="form_page">
      <form action="evenement_admin.php" method="post" class="event">
        <?php 
          echo"
            <input type='text' name='titre_mo' size='50' placeholder='Titre de l&#39;événement' value='".str_replace("'","&#39;",$_POST["title_event"])."'/>
            <br/> 

            <input size='20' type='date' name='date_mo' placeholder='Date' value='".$_POST["date_event"]."'/>
            <input size='20' type='time' name='heure_mo' placeholder='Heure' value='".$_POST["heure_event"]."'/>

            <br/>
            <input type='text' name='lieu_mo' size='50' placeholder='Lieu' value='".str_replace("'","&#39;",$_POST["lieu_event"])."'/>
            <br/>
            <input type='text' name='description_mo' size='50'  placeholder='Description de l&#39;événement' value='".str_replace("'","&#39;",$_POST["obj_event"])."'/></li>
            <br/>
            <input type='hidden' name='id_event' value='".$_POST["id_event"]."'/>"
        ?>
        <input type="submit" name="modif" value="Valider"/>

      </form>

    </div> 
    
  </body>
  
  
</html>
