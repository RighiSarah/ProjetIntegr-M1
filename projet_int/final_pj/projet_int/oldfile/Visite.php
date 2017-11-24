<?php session_start();?>
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
                <!--<div class="container col-md-offset-4">-->
                        <form action="" method="POST" enctype="multipart/form-data" id="visite" name ="visite">
                            <!--<div class="form-group ">-->
                                 <!--<label for="name">  Nom:</label>-->
                                <input type="text" class="form-control" id="name" placeholder="Nom" name="name" style = "width:400px" required> 
                                <br/>
                                 <!--<label for="name">  Pr&eacute;nom :</label>-->
                                <input type="text" class="form-control" id="prenom" placeholder=" Pr&eacute;nom" name="prenom" style = "width:400px" required> 
                                <br/>
                                 <!--<label for="mail"> Email :</label>-->
                                <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required>
                                <br/>                      
                				<!--<label for="mail"> Lien :</label>-->
                				<select class="form-control" id="lien" name="lien" style = "width:400px">
                					<option>Lien 1</option>
                					<option>Lien 2</option>
                				</select>
                                <br/>
                                <!--<label for="mail"> Lieu :</label>-->
                                <textarea name="Lieu" placeholder="Pr&eacute;cisez le lieu" rows="4" cols="40" required></textarea>
                            <!--</div>-->
                                <br/>
    		    
                                <input type="submit" class="btn btn-info" id="env" name="env" value="Envoyer">
                        </form>
                    </div>

                <!--</div>-->
            </div>

            <!-- footer --> 
            <div class="footer">
                <?php include 'templates/includes/$footpage.html' ?>
                <script src="https://use.fontawesome.com/8c182752b4.js"></script>
            </div>

        </div>  		 			 
    </body>
   

</html>