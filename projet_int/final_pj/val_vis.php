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
        <?php require 'models/gestion_visite.php' ?>
        <div class="navigation">
		  <?php include 'templates/includes/$navigation.php' ?>
		</div>
   
<div class="container">
    <div class="col-md-2"></div>
    
         <div class="title_page">
            <h1>Validation des visites</h1>
        </div>
 
         <form  style ="padding-top: 3em;" action="val_vis.php" method="POST"  id="ins" name="valvis">
        <?php
            $vis = new Visites();
            $liste = $vis->ListeVisites();
            $i =0; 
           
            echo " <table class='table table-striped'>";
            echo " <thead><tr><th>Nom</th><th>Prénom</th><th>Mail</th><th>Lien</th><th>Lieu</th><th>Valider ?</th><th>Rejeter ?</th></tr></thead>";
            echo "<tbody>";
             while ($row = $liste->fetch_assoc()){ 
                
                 echo "<tr><td>".$row["nom"]."</td><td>".$row["prenom"]."</td><td>".$row["email"].
                         "</td><td>".$row["lien"]."</td><td>".$row["lieu"]."</td><td><input name='ch".$i."' type='radio' value='acc' checked='true'></td>"
                         ."<td><input name='ch".$i."' type='radio' value='rej'></td></tr>";
                 echo "<input name='pers".$i."' value='".$row["email"]."' type='hidden'>";
                 $i+=1;
             }
            echo "</tbody>";
            echo"</table>";
         ?> 
         <input type="submit" class="btn btn-info" name ="env" id= "env" value="Envoyer">
          
        </form>
         <?php 
         $p = new Visites();
         $nbr=(count($_POST)-1)/2;
         $i=0;
    if(isset($_POST['env'])){
        while($i < $nbr){
           if($_POST["ch".$i]=="acc") {
                $identifiant = $_POST["pers".$i];
          $p ->ValidationVisite($identifiant);
           }
          $i++;
        };
    }
    	 
         ?>
         
</div>


    
    
    
</body>
</html>