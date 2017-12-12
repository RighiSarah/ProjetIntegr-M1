<?php
session_start();
ini_set('display_errors', 1); //afficher les warnings

// on teste si le formulaire a été soumis
if (isset ($_POST['go']) && $_POST['go']=='Poster') {
	// on teste le contenu de la variable $auteur
	if ( !isset($_POST['message']) || !isset($_GET['numero_du_sujet'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	if ( empty($_POST['message']) || empty($_GET['numero_du_sujet'])) {
		$erreur = '<div class="alert alert-danger">
  					<strong>ERREUR !</strong> Au moins un des champs est vide.
				</div>';
	}
	// si tout est bon, on peut commencer l'insertion dans la base
	else {
		include 'connect_db.php' ;
                try
              {
                //$base = new PDO('mysql:host=localhost;dbname=chifaa;charset=utf8', 'root', '');
                 $base = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
            }
               catch (Exception $e)
                {
                 die('Erreur : ' . $e->getMessage());
                }

		// on recupere la date de l'instant présent
		$date = date("Y-m-d H:i:s");
		// on recupere le nom d'utilisateur 
		$user_check = $_SESSION['ident'];
			// on prépare notre requête
		$ses_sql = $base-> query ('SELECT Nom, Prenom FROM personnes WHERE Identifiant="'.$user_check.'"');
		while ($data = $ses_sql->fetch()) {
				$auteur = $data['Nom']." ".$data['Prenom'];
		}
				$ses_sql->closeCursor();
	
		// on recupere l'id du sujet 
		$id_sujet= $_GET['numero_du_sujet'];
		// préparation de la requête d'insertion (table forum_reponses)
		$sql = $base->prepare('INSERT INTO forum_reponses (id, auteur, message, date_reponse,correspondance_sujet) VALUES (:id, :auteur , :message, :date_reponse, :correspondance_sujet)');
		$sql -> execute(array(
			'id' => "", 
			'auteur' => $auteur,
			'message' => $_POST['message'],
			'date_reponse' => $date,
			'correspondance_sujet' => $id_sujet

	    ));
		// préparation de la requête de modification de la date de la dernière réponse postée (dans la table forum_sujets)
		$req = $base-> prepare('UPDATE forum_sujets SET date_derniere_reponse=:date_derniere_reponse WHERE id=""');
		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		$req ->execute(array(
				'date_derniere_reponse' => $date,

		));



		// on redirige vers la page de lecture du sujet en cours
		header('Location: lire_sujet.php?id_sujet_a_lire='.$_GET['numero_du_sujet']);

		// on termine le script courant
		exit;
	}
	}
}
?>
<html>
<head>
<title>Insertion d'une nouvelle réponse</title>
        <?php include 'templates/includes/$head.html' ?>
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
            <h1> Insérer votre réponse </h1>
        </div>

<!-- on fait pointer le formulaire vers la page traitant les données -->
<!--<form action="insert_sujet.php" method="post"> -->

	<form class="form-horizontal" action="insert_reponse.php?numero_du_sujet=<?php echo $_GET['numero_du_sujet']; ?>" method="post">
			<fieldset>
			<br>
			<br>
			
			<!-- Textarea -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="message">Message</label>

			  <div class="col-md-4">   
			    <textarea class="form-control" id="message" name="message" rows="10" cols="60"><?php if (isset($_POST['message'])) echo htmlentities(trim($_POST['message'])); ?></textarea>

			  </div>
			</div>
			</fieldset>
		
	</form>
<?php
// on affiche les erreurs éventuelles
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</div></div></div>

</body>
</html>