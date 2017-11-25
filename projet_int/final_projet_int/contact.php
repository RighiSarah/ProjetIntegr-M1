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

             <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key='AIzaSyDPDhZWHvio3QsJ2WMxB1FFVzQ4K7aOURc' ></script><div style='overflow:hidden;height:400px;width:520px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embedmaps.net'>google maps for my website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=724178c249e1c2322d2aedd925a82b9846899db9'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(45.7747851,4.956323099999963),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(45.7747851,4.956323099999963)});infowindow = new google.maps.InfoWindow({content:'<strong>Chifaa</strong><br>4 Rue Victor Considerant<br>69150 D&eacute;cines-Charpieu<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>


           </div>
           <div class="col-md-6">
                 <?php

                     $action = ( array_key_exists( 'action', $_REQUEST) ? $_REQUEST['action'] : "" );


                     if ($action=="")
                         {
                 ?>
                     <form  action="" method="POST" enctype="multipart/form-data">

                         <div class="conteneur">
                             <input type="hidden" name="action" value="submit">
                                 Nom et pr&eacute;nom:<br>
                             <input name="name" type="text" value="" size="30" class="form-control"/><br>
                                 Adresse mail:<br>
                             <input name="email" type="text" value="" size="30" class="form-control"/><br>
                                 Votre message:<br>
                             <textarea name="message" rows="10" cols="30" class="form-control"></textarea><br>
                             <input type="submit" value="Envoyer message" name="envoie"  class="btn btn-info" />
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
           </div>
         </div>
         <div class="footer">
           <?php include 'templates/includes/$footpage.html' ?>
         </div>
    </body>
</html>
