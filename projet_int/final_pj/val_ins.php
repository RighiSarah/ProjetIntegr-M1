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
	</head>

<body>
        <?php require 'models/gestion_ins.php' ?>
        <div class="navigation">
		  <?php include 'templates/includes/$navigation.php' ?>
        </div>
   
<div class="container">
    <div class="col-md-2"></div>
    
    <div class="title_page">
            <h1>Validation des inscriptions</h1>
        </div>

        <form style ="padding-top: 3em;" action="" method="POST"  id="ins" name="valins">
        <?php
            $ins = new Inscription();
            $liste = $ins ->ListeDemandeInscription();
            $i =0; 
           
            echo " <table class='table table-striped'>";
            echo " <thead><tr><th>Nom</th><th>Prénom</th><th>Mail</th><th>Telephone</th><th>Adresse</th><th>Valider ?</th><th>Rejeter ?</th></tr></thead>";
            echo "<tbody>";
             while ($row = $liste->fetch_assoc()){ 
                
                 echo "<tr><td>".$row["Nom"]."</td><td>".$row["Prenom"]."</td><td>".$row["Mail"].
                         "</td><td>".$row["Telephone"]."</td><td>".$row["Adresse"]."</td><td><input name='ch".$i."' type='radio' value='acc' checked='true'></td>"
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
         $p = new Inscription();
         $nbr=(count($_POST)-1)/2;
         $i=0;
        if(isset($_POST['env'])){
            while($i < $nbr){
                if($_POST["ch".$i]=="acc") {
                    $identifiant = $_POST["pers".$i];
                    $p ->ValidationInscription($identifiant);
                }
                $i++;
            }
        }
    	 
         
         ?>

         
         
</div>


    
    
    
</body>
</html>