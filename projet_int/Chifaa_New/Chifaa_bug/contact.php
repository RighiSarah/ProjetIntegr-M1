<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
    	<?php require ('models/gestion_contact.php') ?>
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
				   <a href="contact.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-envelope"></span> Contact</a>
				   </div>        
			   </div>
		   </div>
	   </div>
	   </br>
         <div class="container contact">
           <div class="col-md-6">
             <adress>
                 CHIFAA<br/>
                 <br/>
                 4 Rue Victor Considerant<br/>
                 69150 D&eacute;cines-Charpieu<br/>
                 Lyon France<br/>
             </adress>
             <br/>
             <p>Tél : 06 15 74 89 37</p>

             <!--changement de maps : en script googlemaps -->

            <?php include 'templates/includes/$map.html' ?>

           </div>
           <div class="col-md-6">
                 
                     <form  action="" method="POST" enctype="multipart/form-data">

                         <div class="conteneur">
                             <input name="surname" type="text" size="30" class="form-control" placeholder="Nom" /><br>
                             <input name="name" type="text" size="30" class="form-control" placeholder="Pr&eacute;nom" /><br>
                             <input name="email" type="text" size="30" class="form-control" placeholder="Adresse mail" /><br>
                             <input name="sujet" type="text" size="30" class="form-control" placeholder="Sujet" /><br>
                             <textarea name="message" rows="6" cols="30" class="form-control" placeholder="Votre message(maximum 1000 caracteres)"></textarea><br>
                             <input type="submit" value="Envoyer message" name="envoie"  class="btn btn-info" />
                         </div>

                     </form>
                 <?php
					if(isset($_POST['envoie'])){
						 $surname=$_POST['surname'];
						 $name=$_POST['name'];
						 $email=$_POST['email'];
						 $sujet=$_POST['sujet'];
						 $message=$_POST['message'];
						 $date = date("Y-m-d H:i:s");
						 
						 $c = new Contact();
						 $c -> setNom($surname);
						 $c -> setPrenom($name);
						 $c -> setMail($email);
						 $c -> setSujet($sujet);
						 $c -> setMsg($message);
						 $c -> setDat($date);
						 $c -> EnvoieMessage();
					 }
                 ?>
           </div>
         </div>
         <div class="footer">
           <?php include 'templates/includes/$footpage.html' ?>
         </div>
    </body>
</html>
