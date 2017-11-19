<!DOCTYPE html>

<html>

    <head>
        <?php require 'models/gestion_visite.php' ?>
        <?php include 'templates/includes/$head.html' ?>
        <style>
            #map {height: 240px;
                    width: 130%;
                }
        </style>
		<link href="templates/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<script src="templates/js/bootstarp.min.js"></script>
    </head>

    <body>
         
         <div class="navigation">

            <?php include 'templates/includes/$navigation.html' ?>

         </div>
		 
		 
		 </br>
		  </br>
		   </br>
		    </br>
			<div class="container col-md-offset-4">
		         <h1>Pr&eacute;voir une visite </h1>	
		    </div>
		<div class="container col-md-offset-4">
        <form  action="" method="POST" enctype="multipart/form-data" id="visite" name ="visite">
              <div class="form-group ">
                 <label for="name">  Nom:</label>
                 <input type="text" class="form-control" id="name" placeholder="Nom" name="name" style = "width:400px" required> 
            </div>
			<div class="form-group ">
                 <label for="name">  Pr&eacute;nom :</label>
                 <input type="text" class="form-control" id="prenom" placeholder=" Pr&eacute;nom" name="prenom" style = "width:400px" required> 
            </div>
			 
            <div class="form-group ">
			
                 <label for="mail"> Email :</label>
                 <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required> 
            </div>
			 <div class="form-group ">
			
                  <div class="form-group">
				    <label for="mail"> Lien :</label>
					  <select class="form-control" id="lien" name="lien" style = "width:400px">
						<option>lien 1</option>
						<option>lien 2</option>
					  </select>
					</div>
            </div>
			
			 <div class="form-group ">
			
                 <label for="mail"> Lieu :</label>
                 <textarea type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="lieu" style = "width:400px" required> </textarea>
            </div>
		    

              <input type="submit" class="btn btn-info" id="env" name="env" value="Envoyer">
          
        </form>

</div> 		 			 
   </body>
   <?php
if(isset($_POST['env'])){
    $mail = $_POST["mail"]; 
    $lieu =  $_POST["lieu"];
    $lien =  $_POST["lien"];
        $v = new Visites();
        $v ->setLien($lien);
        $v ->setLieu($lieu);
        $v ->setMail($mail);
        $v ->Prevoire_visite();
       
}	 
?>	