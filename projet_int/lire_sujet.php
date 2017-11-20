<html>
	<head>
			<title>Lecture d'un sujet</title>
	 		<?php include 'templates/includes/$head.html' ?>
	        <style>
	            #map {height: 240px;
	                    width: 130%;
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
<?php
if (!isset($_GET['id_sujet_a_lire'])) {
	echo 'Sujet non défini.';
}
else {
?>	
	                <div class="row col-md-10 col-md-offset-1 custyle">
                <table class="table table-striped custab" id ="myTable">
                <thead>
 
         
                    <tr>
                        <th>Sujet</th>
                        <th>Auteur</th>
                       <th>Message</th>
                      
                    </tr>
                 </thead>


	<?php
	// on se connecte à notre base de données
	try
		{
			$base = new PDO('mysql:host=localhost;dbname=chifaa;charset=utf8', 'root', '');
		}
			catch (Exception $e)
			{
        		die('Erreur : ' . $e->getMessage());
			}

	// on prépare notre requête
	//$sql = 'SELECT auteur, message, date_reponse FROM forum_reponses WHERE correspondance_sujet="'.$_GET['id_sujet_a_lire'].'" ORDER BY date_reponse ASC';
	$sql = $base-> query ('SELECT auteur, message , date_reponse FROM forum_reponses WHERE correspondance_sujet="'.$_GET['id_sujet_a_lire'].'" ORDER BY date_reponse ASC');
	// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
	//$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	//$sql ->execute(array ($_GET['id_sujet_a_lire']));
	// on va scanner tous les tuples un par un
	while ($data = $sql->fetch()) {

	// on décompose la date
	sscanf($data['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);

	// on affiche les résultats
	echo '<tr>';
	echo '<td>';

	// on affiche le nom de l'auteur de sujet ainsi que la date de la réponse
	echo htmlentities(trim($data['auteur']));
	//echo '<br />';
	//echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;

	echo '</td><td>';

	// on affiche le message
	echo nl2br(htmlentities(trim($data['message'])));
	echo '</td></tr>';
	}

	// on libère l'espace mémoire alloué pour cette reqête
	//mysql_free_result ($sql);
	// on ferme la connection à la base de données.

	$sql->closeCursor();
	
	?>

	<!-- on ferme notre table html -->
	</table></div>
	<br /><br />
	<!-- on insère un lien qui nous permettra de rajouter des réponses à ce sujet -->
	<a href="./insert_reponse.php?numero_du_sujet=<?php echo $_GET['id_sujet_a_lire']; ?>">Répondre</a>
	<?php
}
?>
<br /><br />
<!-- on insère un lien qui nous permettra de retourner à l'accueil du forum -->
<a href="FAQ.php">Retour à l'accueil</a>

</body>
</html>