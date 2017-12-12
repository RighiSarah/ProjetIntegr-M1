<?php session_start(); ?>

<!DOCTYPE html>

<html>

    <head>
        <?php require 'models/gestion_ins.php' ?>
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
				   <a href="Inscription.php" class="btn btn-block btn-lg btn-primary"><i class="fa fa-handshake-o"></i> Devenir bénévole</a>
				   </div>        
			   </div>
		   </div>
	   </div>
	   </br>
		 <div class="cont">
            <div id="body">
                <div class="form_page">
                    <form  action="" method="POST" enctype="multipart/form-data" id="ins" name="ins" onSubmit="return VerifyPassword()">

                        <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" style = "width:400px" required/>

                        <input type="text" class="form-control" id="prenom" placeholder=" Pr&eacute;nom" name="prenom" style = "width:400px" required/>

                        <input type="password" class="form-control" id="mpass1" placeholder="Mot de passe" name="mpass1" style = "width:400px" required/>

                        <input type="password" class="form-control" id="mpass2" placeholder=" Confirmer mot de passe" name="mpass2" style = "width:400px" required/>

                        <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required/>
                        
                        <input type="mail" class="form-control" id="addr" placeholder="Adresse" name="addr" style = "width:400px" required/>

                        <input type="text" class="form-control" id="tel" placeholder="Telephone" name="telephone" style = "width:400px" required/>

                        <div style="line-height: 2em;">
                           <h4>Voulez vous partagez vos coordonnées avec les autres membres ?</h4>
                           <p> Si vous cochez "oui", vos coordonnées seront partagées avec tous les membres bénévoles
                           	   de l'association sur le Carnet d'Adresse de l'espace membre </p>
                           <input type="radio" id="partage"  name="partage" value="1" checked="true" /><label> &nbsp;Oui</label>
                           <input type="radio" id="partage"  name="partage" value ="0" /><label> &nbsp;Non</label>
                           
                           <h4> Avez-vous déjà été bénévole dans une association ? </h4>
                           <input type="radio" id="benevole"  name="benevole" value="1"  /><label> &nbsp;Oui</label>
                           <input type="radio" id="benevole"  name="benevole" value ="0" /><label> &nbsp;Non</label>
                           
                           <p> Si oui, merci de préciser de quelle association et pendant combien de temps : 
                           		<textarea name="xp" rows="6" cols="30" class="form-control" placeholder="Vos expériences en bénévolat"></textarea>
                           </p>
                           <input type="submit" class="btn btn-info" name ="env" id= "env" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>

            <!-- footer -->
            <div class="footer">
                <?php include 'templates/includes/$footpage.html' ?>
                <script src="https://use.fontawesome.com/8c182752b4.js"></script>
            </div>

        </div>
        <?php
			if(isset($_POST['env'])){
			    $nom = $_POST["nom"];
				$prenom = $_POST["prenom"];
				$mpass1 = $_POST["mpass1"];
				$mpass2 = $_POST["mpass2"];
				$mail = $_POST["mail"];
				$adresse = $_POST["addr"];
				$telephone =  $_POST["telephone"];
				$partage =  $_POST["partage"];
				$benevole = $_POST["benevole"];
				$xp_benev = $_POST["xp"];
			
					$p = new Inscription();
					$p ->setNom($nom);
					$p ->setPrenom($prenom);
					$p->setPasswrd($mpass1);
					$p ->setTelephone($telephone);
					$p ->setAdresse($adresse);
					$p ->setPartage($partage);
					$p ->setMail($mail);
					$p ->setBenevole($benevole);
					$p ->setXpBenev($xp_benev);
					$p ->DemandeInscription();
			
			}
			?>
		<script type="text/javascript">
		  function VerifyPassword(){
			  var pass1= document.getElementById("mpass1").value;
			  var pass2 = document.getElementById("mpass2").value;
		
			  if((pass1 != "") && (pass2 != "")){
				  if(pass1 !=  pass2 )
				  {
				  alert("Veuillez vérifier la saisie des mots de passe.");
				  return false;
		
				 }else
				 return true;
				}
			}
		
		</script>
    </body>
</html>
