<?php 
session_start();
if (isset($_POST['supp'])){
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
        <div class="navigation">
		  <?php include 'templates/includes/$navigation.php' ?>
        </div>
   
<div class="container">
    <div class="col-md-2"></div>
    
    <div class="title_page">
        <h1>Messagerie</h1>
    </div>

        <?php
            include 'connect_db.php';
        
            //creer la connection 
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error){
                die("Connection échoue: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM message ORDER BY identifiant DESC";
            $events = mysqli_query($conn,$sql);
            //initialiser array
            $array = array();
            //entrer dans while pour etre certain que array existe 
            while ($row = mysqli_fetch_assoc($events)) {
                $array[] = $row;
            }
            if (sizeof($array)==0){

                echo "<p style='text-align:center; font-size:150%;'>Il n' y a pas de message.</p>";

            }else if (sizeof($array)>0){
                echo " <table class='table table-striped'>";
                echo " <thead><tr><th>Nom</th><th>Prénom</th><th>Mail</th><th>Date</th><th>Sujet</th><th>Message</th><th>Statut</th></tr></thead>";
                echo "<tbody>";
                for ($i=0; $i < sizeof($array); $i++){ 
                     echo "<tr>
                            <td>".$array[$i]["nom"]."</td>
                            <td>".$array[$i]["prenom"]."</td>
                            <td>".$array[$i]["mail"]."</td>
                            <td>".$array[$i]["date"]."</td>
                            <td>".$array[$i]["sujet"]."</td>
                            <td>".$array[$i]["mess"]."</td>
                            <td>".$array[$i]["repond"]."</td>";
                            if($array[$i]["repond"]!=="Repondu"){
                            echo"
                            <form action='mess_repond.php' method = 'POST'>
                                <td><input name='rep' type='submit' value='Répondre'></td>
                                <input name='id_mess' value='".$array[$i]["identifiant"]."' type='hidden'>
                                <input type='hidden' name='nom_mess' value='".str_replace("'","&#39;",$array[$i]["nom"])."'/>
                                <input type='hidden' name='prenom_mess' value='".str_replace("'","&#39;",$array[$i]["prenom"])."'/>
                                <input type='hidden' name='mail_mess' value='".str_replace("'","&#39;",$array[$i]["mail"])."'/>
                                <input type='hidden' name='date_mess' value='".$array[$i]["date"]."'/>
                                <input type='hidden' name='sujet_mess' value='".str_replace("'","&#39;",$array[$i]["sujet"])."'/>
                                <input type='hidden' name='mess_mess' value='".str_replace("'","&#39;",$array[$i]["mess"])."'/>
                                <input type='hidden' name='rep_mess' value='".$array[$i]["repond"]."'/>
                            </form>";
                            }
                        echo"
                            <form action='' method = 'POST'>
                                <td><input name='supp' type='submit' value='Supprimer'></td>
                                <input name='id_mess' value='".$array[$i]["identifiant"]."' type='hidden'>
                            </form>
                        </tr>";
                     
                 }
                echo "</tbody>";
                echo"</table>";
            }

            if (isset($_POST['supp'])) {
                mysqli_query($conn,'DELETE FROM message WHERE identifiant = '.$_POST['id_mess'].';');
                echo $conn->error;
            }

            if(isset($_POST['env'])){
                //send email 
                
                $from="From: CHIFAA<as.chifaa@gmail.com>\r\nReturn-path: as.chifaa@gmail.com";
                $subject=$_POST["sujet_send"];
                mail($_POST['mail_send'], $subject, $_POST['mess_send'], $from);
                echo "Email envoyé!";
                            
                //change statut de message  
                $id = $_POST['id_mess'];   
                $req = "UPDATE message SET repond='Repondu' WHERE identifiant = ?";
                $stmt = $conn->prepare($req);
                $stmt->bind_param("i",$id);
                $events = $stmt->execute();
            }


            $conn->close();
         ?> 

      
         
         
</div>


    
    
    
</body>
</html>