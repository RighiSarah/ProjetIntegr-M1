<!DOCTYPE html>

<html>

    <head>
        
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
			 
		        <h1> Demande Inscription </h1>	
		     
		<div class="container col-md-offset-4">
        <form  action="" method="POST" enctype="multipart/form-data">
            <div class="form-group ">
                 <label for="name">  Nom:</label>
                 <input type="text" class="form-control" id="name" placeholder="Nom" name="name" style = "width:400px"> 
            </div>
			<div class="form-group ">
                 <label for="name">  Pr&eacute;nom :</label>
                 <input type="text" class="form-control" id="prenom" placeholder=" Pr&eacute;nom" name="name" style = "width:400px"> 
            </div>
             <div class="form-group ">
                 <label for="name">  Mot de passe :</label>
                 <input type="password" class="form-control" id="mpass1" placeholder="mot de passe" name="name" style = "width:400px"> 
            </div>
			<div class="form-group ">
                 <label for="name">  Confirmation mot de passe :</label>
                 <input type="password" class="form-control" id="mpass2" placeholder=" Confirmer" name="name" style = "width:400px"> 
            </div>
            <div class="form-group ">
			
                 <label for="mail"> Email :</label>
                 <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px"> 
            </div>
              <input type="submit" class="btn btn-info" value="Envoyer">
          
        </form>

</div> 
		 
		 
		 
		 
   </body>