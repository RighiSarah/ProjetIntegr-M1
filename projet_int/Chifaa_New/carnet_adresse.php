<?php
session_start();
ini_set('display_errors', 1); //afficher les warnings
?>
<html>
 <head>
        
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
		<link href="templates/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="templates/fonts" rel="stylesheet"  media="all" />
		<script src="templates/js/bootstarp.min.js"></script>
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
               <a href="carnet_adresse.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp; Carnet d'adresses</a>
               </div>        
           </div>
       </div>
   </div>
          </br>    
          </br>
          </br>
          <?php
          // **********************************************BDD*********************************************
          // on se connecte à notre base de données
              include 'connect_db.php' ;
                try
              {

                 $base = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
            }
               catch (Exception $e)
                {
                 die('Erreur : ' . $e->getMessage());
                }

             // préparation de la requete
            $sql =$base->query( 'SELECT Nom, Prenom, Telephone, Mail, Adresse FROM personnes WHERE Partage="1" && valide="1" ORDER BY Nom ASC ');
               // on compte le nombre de personnes 
            $nb_personnes = $sql->rowCount();

           if ($nb_personnes == 0) {
            echo '</br>';
            echo '<div class="row col-md-8 col-md-offset-2 alert alert-danger">
                     <strong>IMPORTANT!</strong> Il n y a aucun membre inscrit pour le moment.
                </div>';
             }
       
         else { ?>
        <div class="row ">
           <div class ="col-md-10 col-md-offset-1 ">
            </br>         
            <input type="text" id="myInput" onkeyup="search()" placeholder="Rechercher une personne ...">
           </div>
        </div>
        </br> 
        </br>
         <div class="row col-md-10 col-md-offset-1 custyle">
                <table class="table table-striped custab" id ="myTable">
                <thead>                
                    <tr>
                        <th><span class="glyphicon glyphicon-user"></span>&nbsp;Nom & Prénom</th>                     
                        <th><span class="glyphicon glyphicon-earphone"></span>&nbsp;Téléphone</th>
                        <th><span class="glyphicon glyphicon-envelope"></span>&nbsp;Mail</th>
                        <th><span class="glyphicon glyphicon-home"></span>&nbsp;adresse</th>                        
                    </tr>
                 </thead>         
            <?php
               
                        while ($data = $sql->fetch())
                 {

                echo '<tr>';
                echo '<td>';                 
                echo htmlentities(trim($data['Nom'])).'&nbsp;&nbsp;&nbsp'.htmlentities(trim($data['Prenom']));
                echo '</td><td>';              
                           
                echo htmlentities(trim($data['Telephone']));
                echo '</td><td>';            
                              
                echo htmlentities(trim($data['Mail']));
                echo '</td><td>';
                              
                echo htmlentities(trim($data['Adresse']));
                echo '</td>';
                echo '</tr>';

         }

          $sql->closeCursor();
         }  ?>
        </table>
    </div>
</div>

    <script>
function search() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
search();
</script>

</body>


</html>