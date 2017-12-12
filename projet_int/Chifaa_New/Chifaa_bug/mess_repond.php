<?php 
  if (!session_id()) session_start(); 
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
				   <a href="mess_repond.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-envelope"></span> Ma messagerie</a>
				   </div>        
			   </div>
		   </div>
	   </div>
	   </br>
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
