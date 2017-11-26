<?php
session_start();
ini_set('display_errors', 1); //afficher les warnings
?>

<html>
	<head>
			<title>Lecture d'un sujet</title>
	 		<?php include 'templates/includes/$head.html' ?>
	      
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
<?php
if (!isset($_GET['id_sujet_a_lire'])) {
	echo 'Sujet non défini.';
}
else {
?>	
	  <div class="row col-md-8 col-md-offset-2 custyle">
	   	<div class="row">
            <h1> Réponses au sujet </h1>
        </div>
     	 </br>
         </br>
      </div>
      <div class="row">
         <div class="col-md-2 "></div> 
          	<div class="btn-group btn-group-lg col-md-offset-2">
 				 <a href="FAQ.php" type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-arrow-left"></span>   Retour au Forum</a>
 				 <a  href="./insert_reponse.php?numero_du_sujet=<?php echo $_GET['id_sujet_a_lire']; ?>" type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-comment"></span>   Répondre</a>
 				
			</div>
        </div>
	<?php
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

		// on prépare notre requête
		$sql = $base-> query ('SELECT auteur, message , date_reponse FROM forum_reponses WHERE correspondance_sujet="'.$_GET['id_sujet_a_lire'].'" ORDER BY date_reponse ASC');

	while ($data = $sql->fetch()) { ?>
		          </br>
		<div class="row col-md-8 col-md-offset-2 custyle ">
			<div class =" panel panel-primary">
				<?php // on décompose la date
					sscanf($data['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
				 ?>
	
				 <div class="panel panel-primary panel-heading"><span class="glyphicon glyphicon-user"></span> <?php echo htmlentities(trim($data['auteur']))?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-calendar"></span>  <?php echo htmlentities(trim($data['date_reponse'])); ?>
				 </div>
 	 			<div class="panel-body">
 	 				<?php echo nl2br(htmlentities(trim($data['message']))); ?> 
 	 			</div>
			</div>
		</div>
	<?php
		}

		$sql->closeCursor();
	
		?>
	<br /><br />
	<?php } ?>
<br /><br />
</div>

</body>
</html>