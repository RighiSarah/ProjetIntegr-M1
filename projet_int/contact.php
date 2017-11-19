<!DOCTYPE html>

<html>

    <head>
        
        <?php include 'templates/includes/$head.html' ?>
        <style>
            #map {height: 240px;
                    width: 130%;
                }
        </style>
    </head>

    <body>
         
         <div class="navigation">

            <?php include 'templates/includes/$navigation.html' ?>

         </div>
        
        <div class="contact">
            <!--Contact-->
            <h1>Contact</h1>

            <!--Adress-->
            <adress>
                Association CHIFAA<br/>
                <br/>
                4 Rue Victor Considerant<br/>
                69150 D&eacute;cines-Charpieu<br/>
                Lyon France<br/>
            </adress>

            <!--Tel-->
            <p>Tél : 06 15 74 89 37</p>
          
            <div id="map"></div>
                <script>
                    function initMap() {
                      var uluru = {lat: 45.774808, lng: 4.956233};
                      var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 17,
                        center: uluru
                      });
                      var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                      });
                    }
                </script>

                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9bMXs_ExyQdIIBEjRzs2uK_gmDJ4Qgwk&callback=initMap">
                </script>
        </div>

        <div class="sendmail">
            
            <?php
                
                $action = ( array_key_exists( 'action', $_REQUEST) ? $_REQUEST['action'] : "" );
                
                
                if ($action=="")    
                    {
            ?>
                <form  action="" method="POST" enctype="multipart/form-data">

                    <div class="conteneur">
                        <input type="hidden" name="action" value="submit">
                            Nom et pr&eacute;nom:<br>
                        <input name="name" type="text" value="" size="30"/><br>
                            Adresse mail:<br>
                        <input name="email" type="text" value="" size="30"/><br>
                            Votre message:<br>
                        <textarea name="message" rows="10" cols="60"></textarea><br>
                        <input type="submit" value="Envoyer message" name="envoie" />
                    </div>

                </form>
            <?php
                    } 
                else                
                    {
                        $name=$_REQUEST['name'];
                        $email=$_REQUEST['email'];
                        $message=$_REQUEST['message'];

                        if (($name=="")||($email=="")||($message==""))
                            {
                                echo "Tous les zones sont nécessaires, veuillez compléter <a href=\"\">le formulaire</a>.";
                            }
                        else
                            {
                            $from="From: $name<$email>\r\nReturn-path: $email";
                            $subject="Message sent using your contact form";
                            mail("email_de_association", $subject, $message, $from);
                            echo "Email envoyé!";
                            }
                    }  
            ?>
  
    </body>
    
</html>