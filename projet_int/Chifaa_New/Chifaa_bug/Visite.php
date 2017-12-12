<?php session_start(); ?>
<!DOCTYPE html>

<html>

    <head>
        <?php require 'models/gestion_visite.php' ?>
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
				   <a href="Visite.php" class="btn btn-block btn-lg btn-primary"><i class="fa fa-users"></i>  Prévoir une visite</a>
				   </div>        
			   </div>
		   </div>
	   </div>
	   </br>

		<div class="cont">
            <div id="body">
                <div class="form_page">
        
                    <form  action="" method="POST" enctype="multipart/form-data" id="visite" name ="visite">
					
						<fieldset>
						
							<legend> Informations relatives au visiteur </legend>
							
								<input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" style = "width:400px" required>
		
								<input type="text" class="form-control" id="prenom" placeholder=" Pr&eacute;nom" name="prenom" style = "width:400px" required>
		
								<input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required>
								
								<input type="text" class="form-control" id="tel" placeholder="T&eacute;l&eacute;phone" name="tel" style = "width:400px" required>
						</fieldset>
						<fieldset>
							<legend> Informations relatives au patient </legend>
								
								<input type="text" class="form-control" id="surname" placeholder="Nom du patient" name="nom_patient" style = "width:400px" required/>
								
								<input type="text" class="form-control" id="nom" placeholder="Pr&eacute;nom du patient" name="prenom_patient" style = "width:400px" required/>
								
								<select class="form-control" id="lien" name="lien" style = "width:400px" required>
									<option value="" disabled selected hidden>--Lien avec le patient--</option>
									<option>Famille</option>
									<option>Ami</option>
									<option>Autre </option>
								</select>
								
								<p> Si Autre, précisez le lien : 
									<input type="text" class="form-control" id="lien" placeholder="Précisez le lien avec le patient" name="lien_autre" style = "width:400px"/>
								</p>
								<select class="form-control" id="lieu" name="lieu" style = "width:400px" required>
									<option value="" disabled selected hidden>--Pr&eacute;sez le lieu--</option>
									<option>&Eacute;tablissement de sant&eacute;</option>
									<option>&Agrave; domicile</option>
								</select>
								
								<input type="text" class="form-control" id="adresse" placeholder="Adresse" name="adresse" style = "width:400px" required/>
								
								<input type="submit" class="btn btn-lg btn-primary" id="env" name="env" value="Envoyer"/>
							
						</fieldset>
                    
                    </form>

                </div>
            </div>
            
            <!--Récupération des données du formulaire -->
            <?php
				if(isset($_POST["env"])){
					$tel = $_POST["tel"];
					$mail = $_POST["mail"];
					$lieu =  $_POST["lieu"];
					$lien =  $_POST["lien"];
					$lien_autre = $_POST["lien_autre"];
					$nom =  $_POST["nom"];
					$prenom =  $_POST["prenom"];
					$nom_patient = $_POST["nom_patient"];
					$prenom_patient = $_POST["prenom_patient"];
					$adresse = $_POST["adresse"];
						$v = new Visites();
						$v ->setTelephone($tel);
						$v ->setNom($nom); 
						$v ->setPrenom($prenom);
						$v ->setLien($lien);
						$v ->setLienAutre($lien_autre);
						$v ->setLieu($lieu);
						$v ->setMail($mail);
						$v ->setNom_patient($nom_patient);
						$v ->setPrenom_patient($prenom_patient);
						$v ->setAdresse($adresse);
						$v ->Prevoir_visite();
        			}
    		?>

            <!-- footer -->
            <div class="footer">
                <?php include 'templates/includes/$footpage.html' ?>
                <script src="https://use.fontawesome.com/8c182752b4.js"></script>
            </div>

        </div>
    </body>
</html>
