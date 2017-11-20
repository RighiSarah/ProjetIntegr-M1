.!DOCTYPE html>

<html>

    <head>
        
        <?php include 'templates/includes/$head.html' ?>
        <style>
            #map {height: 240px;
                    width: 130%;
                }
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

            <?php include 'templates/includes/$navigation_intranet.html' ?>

         </div>
		      </br>
          </br>
          </br>
          </br>
          <div class="row">
          <div class="col-lg-12">
           <div class="container">
        <div class="row">
            <a href="FAQ.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-question-sign"></span> Questions fréquemment posées / F.A.Q</a>
            <div class="row col-md-10 ">
            </br>
          </br>
          </br>
          </br>
            <input type="text" id="myInput" onkeyup="search()" placeholder="Rechercher un sujet..">
        </div>
        </div>

        
        </div>
    </div>
   
         </br>
          </br>
          </br>
          </br>
          <?php
          // **********************************************BDD*********************************************
          // on se connecte à notre base de données
            try
              {
                 $base = new PDO('mysql:host=localhost;dbname=chifaa;charset=utf8', 'root', '');
            }
                catch (Exception $e)
                {
                 die('Erreur : ' . $e->getMessage());
                }
            // préparation de la requete
            $sql =$base->query( 'SELECT id, auteur, titre, date_derniere_reponse FROM forum_sujets ORDER BY date_derniere_reponse DESC');

             ?>
                <div class="row col-md-10 col-md-offset-1 custyle">
                <table class="table table-striped custab" id ="myTable">
                <thead>
 
                <a href="insert_sujet.php" class="btn btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Insérer un sujet</a>
                    <tr>
                        <th>Sujet</th>
                        <th>Auteur</th>
                        <th>Date dernière réponsee</th>
                        <th class="text-center">Action</th>
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
                </td><td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
              
                </tr>

    <?php
    }

    // on libère l'espace mémoire alloué pour cette requête
    //mysql_free_result ($req);
    // on ferme la connexion à la base de données.
    //mysql_close ();
    $sql->closeCursor();
    ?>
        </table>
    </div>
</div>
<?php include 'templates/includes/$footpage.html' ?>
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