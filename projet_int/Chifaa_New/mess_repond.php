<?php 
  if (!session_id()) session_start(); 
?>

<!DOCTYPE HTML>
<html>
  <head>
    <?php include 'templates/includes/$head.html' ?>
  </head>

  <body>
    
    <!-- bar de menu -->
    <div class="navigation">
      <?php include 'templates/includes/$navigation.php' ?>
    </div>

    
    <div class="title_page">
      <h1>Répond aux messages</h1>
    </div>
                 <div class="form_page">
                     <form  action="messagerie.php" method="POST" enctype="multipart/form-data">

                        <?php 
                        echo"
                             <input name='mail_send' type='text' size='30' class='form-control' placeholder='Adresse mail' value='".str_replace("'","&#39;",$_POST["mail_mess"])."' /><br>
                             <input name='sujet_send' type='text' size='30' class='form-control' placeholder='Sujet' value='RE: ".str_replace("'","&#39;",$_POST["sujet_mess"])."' //><br>
                             <textarea name='mess_send' rows='6' cols='30' class='form-control' placeholder='Votre message'></textarea><br>
                              
                              <input type='hidden' name='id_mess' value='".$_POST["id_mess"]."'/>";
                        ?>
                             <input type='submit' value='Envoyer' name='env' class='btn btn-info' />
                        

                     </form>
                </div>

    
  </body>
  
  
</html>
