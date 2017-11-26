<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'templates/includes/$head.html' ?>
    </head>

    <body>
         <div class="navigation">
            <?php include 'templates/includes/$navigation.php' ?>
         </div>
        <div class="title_page">
                  <h1>Contact</h1>
        </div>

         <div class="container contact">
           <div class="col-md-6">
             <adress>
                 Association CHIFAA<br/>
                 <br/>
                 4 Rue Victor Considerant<br/>
                 69150 D&eacute;cines-Charpieu<br/>
                 Lyon France<br/>
             </adress>
             <br/>
             <p>Tél : 06 15 74 89 37</p>

             <!--changement de maps : en script googlemaps -->

            <?php include 'templates/includes/$map.html' ?>

           </div>
           <div class="col-md-6">
                 
                     <form  action="" method="POST" enctype="multipart/form-data">

                         <div class="conteneur">
                             <!--<input type="hidden" name="action" value="submit" placeholder="N">-->
                             <input name="name" type="text" size="30" class="form-control" placeholder="Nom et pr&eacute;nom" /><br>
                             <input name="email" type="text" size="30" class="form-control" placeholder="Adresse mail" /><br>
                             <input name="sujet" type="text" size="30" class="form-control" placeholder="Sujet" /><br>
                             <textarea name="message" rows="6" cols="30" class="form-control" placeholder=" Votre message(maximum 1000 caracteres)"></textarea><br>
                             <input type="submit" value="Envoyer message" name="envoie"  class="btn btn-info" />
                         </div>

                     </form>
                 <?php
                        include 'connect_db.php';
                        //creer la connection 
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error){
                            die("Connection échoue: " . $conn->connect_error);
                        }

                        if(isset($_POST['envoie'])){
                             $name=$_POST['name'];
                             $email=$_POST['email'];
                             $sujet=$_POST['sujet'];
                             $message=$_POST['message'];
                             $date = date("Y-m-d H:i:s");

                             if (($name=="")||($email=="")||($sujet=="")||($message==""))
                                 {
                                    echo '<script type="text/javascript">alert("Toutes les zones sont nécessaires, veuillez compléter le formulaire.");</script>';
                                    
                                 }
                             else
                                {   
                                    $sql = "INSERT INTO message (identifiant,nom,mail,date,sujet,mess) VALUES (DEFAULT,?, ?, ?, ?,?)";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("sssss", $name, $email,$date,$sujet,$message);
                                    $events = $stmt->execute();

                                    if ($events !== FALSE) echo '<script type="text/javascript">alert("Message envoyé! Notre administrateur vous répondra dans les meilleurs délais.");</script>';
                                }

                                    $conn->close();
                                 
                         }
                 ?>
           </div>
         </div>
         <div class="footer">
           <?php include 'templates/includes/$footpage.html' ?>
         </div>
    </body>
</html>
