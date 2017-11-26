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
            <a href="FAQ.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-question-sign"></span> Questions fréquemment posées / F.A.Q</a>
          </div>        
        </div>
    </div>
   </div>
         </br>   
         </br>
         </br>
          <div class ="row " >
            <div class="col-lg-8">
              <div class="col-lg-4">
                <a href="insert_sujet.php" class="btn btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Insérer un sujet</a>
              </div>
            </div>
          </div>
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
         $sql =$base->query( 'SELECT id, auteur, titre, date_derniere_reponse FROM forum_sujets ORDER BY date_derniere_reponse DESC');
            // on compte le nombre de sujets du forum
         $nb_sujets = $sql->rowCount();

          if ($nb_sujets == 0) {
            echo '</br>';
            echo '<div class="row col-md-8 col-md-offset-2 alert alert-danger">
                     <strong>IMPORTANT!</strong> Aucune question n\'a été encore posé sur le forum.
                  </div>';
          }
            
       else { ?>
         <div class="row ">
          <div class ="col-md-10 col-md-offset-1 ">
            </br>
            </br>          
            <input type="text" id="myInput" onkeyup="search()" placeholder="Rechercher un sujet..">
          </div>
         </div>
            </br>
        <div class="row col-md-10 col-md-offset-1 custyle">
            <table class="table table-striped custab" id ="myTable">
                <thead>
                    <tr>
                        <th>Sujet</th>
                        <th>Auteur</th>
                        <th>Date dernière réponsee</th>
                        <th class="text-center"></th>
                    </tr>
                 </thead>         
        <?php
               
               while ($data = $sql->fetch())
                 {
                sscanf($data['date_derniere_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
                // on affiche les résultats
                echo '<tr>';
                echo '<td>';
                 // on affiche le titre du sujet, et sur ce sujet, on insère le lien qui nous permettra de lire les différentes réponses de ce sujet                
                echo '<a href="lire_sujet.php?id_sujet_a_lire=' , $data['id'] , '">' , htmlentities(trim($data['titre'])) , '</a>';
                echo '</td><td>';
                                // on affiche le nom de l'auteur de sujet
                echo htmlentities(trim($data['auteur']));
                echo '</td><td>';
                // on affiche la date de la dernière réponse de ce sujet
                echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;
                  ?>
                </td><td class="text-center"><a class='btn btn-info btn-sm' <?php echo 'href=" lire_sujet.php?id_sujet_a_lire=' , $data['id'] , ' "'?>><span class="glyphicon glyphicon-edit"></span> Lire les réponses</a> </td>              
                </tr>

        <?php
    }
  }

    $sql->closeCursor();
    ?>
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