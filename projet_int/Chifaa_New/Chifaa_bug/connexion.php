<?php
session_start(); 
ini_set('display_errors', 1);
require 'models/connexion.php' ;
if(isset($_POST['env'])){
    $mail = $_POST["mail"]; 
    $mpass =  $_POST["mpass"];
    $v = new Connexion();
    $v ->setMail($mail);
    $v->setPasswrd($mpass);
    $identifiant = $v->verifiIdentite();
    if ($identifiant == null){
        header("Location:connexion.php?tent=1");
    }else{
        $_SESSION["ident"] = $identifiant;
        header("Location:index.php");
    }     
}?>
<!DOCTYPE html>

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
				   <a href="connexion.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-user"></span> Connexion</a>
				   </div>        
			   </div>
		   </div>
	   </div>
	   </br>
        <div class="cont">
            <div id="body">           
                <div class="form_page">
                    <form  action="" method="POST" enctype="multipart/form-data">
        			 
                        <!--<div class="form-group ">-->
                            <!--<label for="mail"> Email :</label>-->
                            <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required> 
                            <br/>
                            <!--<label for="name">  Mot de passe :</label>-->
                            <input type="password" class="form-control" id="mpass" placeholder="Mot de passe" name="mpass" style = "width:400px" required> 
                        <!--</div>-->
                            <br/>
                            <input type="submit" class="btn btn-info" id="env" name="env" value="Connecter">
                  
                    </form>
                </div>
				
				 
                <script language="javascript">  
                 if(<?php if(isset($_GET["tent"])) echo "true"; else echo "false"; ?>) alert ("Identifiant ou mot de passe érroné");
                    document.getElementById('mail').focus();
                 </script>
               
            </div>
                 <!-- footer --> 
            <div class="footer">
                <?php include 'templates/includes/$footpage.html' ?>
                <script src="https://use.fontawesome.com/8c182752b4.js"></script>
            </div>

        </div>  
    </body>
</html>
