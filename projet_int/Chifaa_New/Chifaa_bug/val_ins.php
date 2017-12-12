<?php 
session_start();
            if (isset($_POST['env'])){
                $redirection = $_SERVER['PHP_SELF'];
                header("Location:$redirection");
            }
          ?>
<!DOCTYPE HTML> 
<html>
                
	<head>
		<?php include 'templates/includes/$head.html' ?>
		<?php require 'models/gestion_ins.php' ?>
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
				   <a href="val_ins.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-check"></span> Demande d'inscriptions</a>
				   </div>        
			   </div>
		   </div>
	   </div>
	   </br>
   
		<div class="container">
			<div class="col-md-2"></div>
				<form style ="padding-top: 3em;" action="" method="POST"  id="ins" name="valins">
				<?php
					$ins = new Inscription();
					$liste = $ins ->ListeDemandeInscription();
					$i = 0; 
					if (mysqli_num_rows($liste) > 0){
						echo " <table class='table table-striped'>";
						echo " <thead><tr><th>Nom</th><th>Prénom</th><th>Mail</th><th>Telephone</th><th>Adresse</th><th>Valider</th><th>Rejeter</th></tr></thead>";
						echo "<tbody>";
						 while ($row = $liste->fetch_assoc()){ 
							 echo "<tr><td>".$row["Nom"]."</td><td>".$row["Prenom"]."</td><td>".$row["Mail"].
									 "</td><td>".$row["Telephone"]."</td><td>".$row["Adresse"].
									 "</td><td><input name='ch".$i."' type='radio' value='acc'></td>"
									 ."<td><input name='ch".$i."' type='radio' value='rej'></td></tr>";
							 echo "<input name='pers".$i."' value='".$row["Identifiant"]."' type='hidden'>";
							 $i+=1;
						 }
						echo "</tbody>";
						echo"</table>";
					 ?> 
					 <input type="submit" class="btn btn-info" name ="env" id= "env" value="Envoyer">
					  
					</form>
					<?php 
					}else{
						echo "Pas de nouvelle demande d'inscription.";
					}
					?>
				 
				 <!-- Traitement du formulaire -->
				 <?php
				 $p = new Inscription();
				 $nbr=(count($_POST)-1)/2;
				 $i=0;
				 if(isset($_POST['env'])){
					while($i < $nbr){
						if($_POST["ch".$i]=="acc") {
							$identifiant = $_POST["pers".$i];
							$p ->ValidationInscription($identifiant);
						}elseif($_POST["ch".$i]=="rej"){
							$identifiant = $_POST["pers".$i];
							$p ->RejetInscription($identifiant);
						}
						$i++;
					}
				}
				 ?>	 
		</div>
	</body>
</html>