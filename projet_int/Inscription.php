<!DOCTYPE html>

<html>

    <head>
        <?php require 'models/gestion_ins.php' ?>
        <?php include 'templates/includes/$head.html' ?>
        <style>
            #map {height: 240px;
                    width: 130%;
                }
        </style>
		<link href="templates/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<script src="templates/js/bootstrap.min.js"></script>
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
   <div class="container">  
        <div class="container col-md-offset-4">
            <form  action="" method="POST" enctype="multipart/form-data" id="ins" name="ins" onSubmit="return VerifyPassword()">
            <div class="required form-group ">
                 <label for="name">  Nom:</label>
                 <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" style = "width:400px" required> 
            </div>
			<div class="form-group ">
                 <label for="name">  Prénom :</label>
                 <input type="text" class="form-control" id="prenom" placeholder=" Pr&eacute;nom" name="prenom" style = "width:400px" required> 
            </div>
             <div class="form-group ">
                 <label for="name">  Mot de passe :</label>
                 <input type="password" class="form-control" id="mpass1" placeholder="mot de passe" name="mpass1" style = "width:400px" required> 
            </div>
			<div class="form-group ">
                 <label for="name">  Confirmation mot de passe :</label>
                 <input type="password" class="form-control" id="mpass2" placeholder=" Confirmer" name="mpass2" style = "width:400px" required> 
            </div>
            <div class="form-group ">
			
                 <label for="mail"> Email :</label>
                 <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required> 
            </div>
             <div class="form-group ">
			
                 <label for="mail"> Adresse:</label>
                 <input type="mail" class="form-control" id="addr" placeholder="Adresse" name="addr" style = "width:400px" required> 
            </div>
             <div class="form-group ">
			
                 <label for="telephone">Telephone :</label>
                 <input type="texte" class="form-control" id="tel" placeholder="Telephone" name="telephone" style = "width:400px"> 
            </div>
            <div class="form-group ">
                <p>voulez vous partagez vos informations avec les autres membres ?</p>
                 <label class="radio-inline">
                     <input type="radio" id="partage"  name="partage" value="oui" checked="true">oui</label>
                 <label class="radio-inline">
                 <input type="radio" id="partage"  name="partage" value ="non">non</label>
            </div>
                <input type="submit" class="btn btn-info" name ="env" id= "env" value="Envoyer">
          
        </form>

</div> 
   </div>	                      
 </body>
<?php
if(isset($_POST['env'])){
   $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mpass1 = $_POST["mpass1"];
    $mpass2 = $_POST["mpass2"];
    $mail = $_POST["mail"]; 
    $telephone =  $_POST["telephone"];
    $partage =  $_POST["partage"];
    $adresse = $_POST["addr"];
    
        $p = new Inscription();
        $p ->setNom($nom);
        $p ->setPrenom($prenom);
        $p->setPasswrd($mpass1);
        $p ->setTelephone($telephone);
        $p ->setAdresse($adresse);
        if($partage=="oui") $partage = 1; else $partage =0;  
        $p ->setPartage($partage);
        $p ->setMail($mail);
        $p ->DemandeInscription();
       
}	 
?>		 
<script type="text/javascript">
  function VerifyPassword(){
      var pass1= document.getElementById("mpass1").value;
      var pass2 = document.getElementById("mpass2").value;
      alert (pass1 +"   "+pass2);
      if((pass1 != "") && (pass2 != "")){
          if(pass1 !=  pass2 )
          {
          alert("Veuillez vérifier la saisie des mots de passe");
          return false;
     
         }else 
         return true;
        }}
    
</script>		