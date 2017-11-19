<?php session_start(); 
require 'models/connexion.php' ;
if(isset($_POST['env'])){
    $mail = $_POST["mail"]; 
    $mpass =  $_POST["mpass"];
        $v = new Connexion();
        $v ->setMail($mail);
        $v->setPasswrd($mpass);
        $identifiant = $v->verifiIdentite();
        if ($identifiant == null){
            echo "header";
            header ("Location: connexion.php?tent=1");
        }else{
            $_SESSION["ident"] = $identifiant;
            
            echo "je suis ".$_SESSION["ident"];
        }     
}	 
	
?>
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
                    
			<div class="container col-md-offset-4">
		         <h1> Connexion</h1>	
		    </div>
		<div class="container col-md-offset-4">
        <form  action="" method="POST" enctype="multipart/form-data">
             
			 
            <div class="form-group ">
			
                 <label for="mail"> Email :</label>
                 <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required> 
            </div>
			
            <div class="form-group ">
                 <label for="name">  Mot de passe :</label>
                 <input type="password" class="form-control" id="mpass" placeholder="mot de passe" name="mpass" style = "width:400px" required> 
            </div>

              <input type="submit" class="btn btn-info" id="env" name="env" value="Connecter">
          
        </form>

</div> 
                    <script language="javascript">  
           if(<?php if(isset($_GET["tent"])) echo "true"; else echo "false"; ?>) alert ("Identifiant ou mot de passe érroné");
           document.getElementById('mail').focus();
            </script>
</body>

