<?php session_start(); ?>
<!DOCTYPE html>

<html>

    <head>
        <?php require 'models/gestion_visite.php' ?>
        <?php include 'templates/includes/$head.html' ?>
    </head>

    <body>
         
         <div class="navigation">

            <?php include 'templates/includes/$navigation.php' ?>

         </div>
		 
		<div class="cont">
            <div id="body">
                <div class="title_page">
                    <h1>Pr&eacute;voir une visite </h1> 
                </div>
                
                <div class="form_page">
                    <form  action="" method="POST" enctype="multipart/form-data" id="visite" name ="visite">
                           
                        <input type="text" class="form-control" id="name" placeholder="Nom" name="nom" style = "width:400px" required> 
                        <br/>
                             
                        <input type="text" class="form-control" id="prenom" placeholder=" Pr&eacute;nom" name="prenom" style = "width:400px" required> 
                        <br/>
            			
                        <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required> 
                        <br/>
            			

        				<select class="form-control" id="lien" name="lien" style = "width:400px" required>
                            <option value="" disabled selected hidden>--Lien avec le patient--</option>
        					<option>Famille</option>
        					<option>Ami</option>
                            <option>Autre</option>
        				</select>
        				<br/>
            			
                        <!--<textarea name="Lieu" placeholder="Pr&eacute;cisez le lieu" rows="4" cols="40" required></textarea>-->

                        <select class="form-control" id="lieu" name="lieu" style = "width:400px" required>
                            <option value="" disabled selected hidden>--Pr&eacute;sez le lieu--</option>
                            <option>&Eacute;tablissement de sant&eacute;</option>
                            <option>&Agrave; domicile</option>
                        </select> 
                        <br/>
            		    
                        <input type="submit" class="btn btn-info" id="env" name="env" value="Envoyer">
                      
                    </form>

                </div> 	
            </div>

            <!-- footer --> 
            <div class="footer">
                <?php include 'templates/includes/$footpage.html' ?>
                <script src="https://use.fontawesome.com/8c182752b4.js"></script>
            </div>

        </div>      	 			 
    </body>

   <?php
        if(isset($_POST['env'])){
            $mail = $_POST["mail"]; 
            $lieu =  $_POST["lieu"];
            $lien =  $_POST["lien"];
            $nom =  $_POST["nom"];
            $prenom =  $_POST["prenom"];
                $v = new Visites();
                $v ->setNom($nom); echo $v->getNom();
                $v ->setPrenom($prenom);echo $v->getPrenom();
                $v ->setLien($lien);echo $v->getLien();
                $v ->setLieu($lieu);echo $v->getLieu();
                $v ->setMail($mail);echo $v->getMail();
              $v ->Prevoire_visite();

        }
    ?>

</html>