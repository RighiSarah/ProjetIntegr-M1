<?php
// on teste si le formulaire a été soumis
if (isset ($_POST['go']) && $_POST['go']=='Poster') {
	// on teste la déclaration de nos variables
	if (!isset($_POST['auteur']) || !isset($_POST['titre']) || !isset($_POST['message'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	// on teste si les variables ne sont pas vides
	if (empty($_POST['auteur']) || empty($_POST['titre']) || empty($_POST['message'])) {
		$erreur = 'Au moins un des champs est vide.';
	}

	// si tout est bon, on peut commencer l'insertion dans la base
	else {
		// on se connecte à notre base
		//$base = mysql_connect ('serveur', 'login', 'password');
		//mysql_select_db ('nom_base', $base) ;
		try
		{
			$base = new PDO('mysql:host=localhost;dbname=chifaa;charset=utf8', 'root', '');
		}
			catch (Exception $e)
			{
        		die('Erreur : ' . $e->getMessage());
			}

		// on calcule la date actuelle
		$date = date("Y-m-d H:i:s");

		// préparation de la requête d'insertion (pour la table forum_sujets)
		//$sql = 'INSERT INTO forum_sujets VALUES("", "'.mysql_escape_string($_POST['auteur']).'", "'.mysql_escape_string($_POST['titre']).'", "'.$date.'")';
		$req = $base->prepare('INSERT INTO forum_sujets (id, auteur,titre,date_derniere_reponse) VALUES(:id,:auteur , :titre, :date_derniere_reponse)');

		//on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		//mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		$req->execute(array(
			'id' => "",
			'auteur' => $_POST['auteur'],
			'titre' => $_POST['titre'],
			'date_derniere_reponse' => $date
		));
		try{
		// on recupère l'id qui vient de s'insérer dans la table forum_sujets
		$id_sujet = $base->lastInsertId();

		echo "New record created successfully. Last inserted ID is: " . $id_sujet;
		    }
		catch(PDOException $e)
		    {
		    echo $req . "<br>" . $e->getMessage();
		    }
		

		// lancement de la requête d'insertion (pour la table forum_reponses
		//$sql = 'INSERT INTO forum_reponses VALUES("", "'.mysql_escape_string($_POST['auteur']).'", "'.mysql_escape_string($_POST['message']).'", "'.$date.'", "'.$id_sujet.'")';

		$sql = $base->prepare('INSERT INTO forum_reponses (id, auteur, message, date_reponse,correspondance_sujet) VALUES (:id, :auteur , :message, :date_reponse, :correspondance_sujet)');
		$sql -> execute(array(
			'id' => "", 
			'auteur' => $_POST['auteur'],
			'message' => $_POST['message'],
			'date_reponse' => $date,
			'correspondance_sujet' => $id_sujet

	    ));

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		//mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base de données
		//$sql->closeCursor();
		mysql_close();

		// on redirige vers la page d'accueil
		header('Location: FAQ.php');

		// on termine le script courant
		exit;
	}
	}
}
?>
<html>
<head>
<title>Insertion d'un nouveau sujet</title>
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
          <div class="row">
          <div class="col-lg-12">
           <div class="container">
        <div class="row">
            <h1> Insertion d'un sujet</h1>
        </div>

        
        </div>
    
   
<!-- on fait pointer le formulaire vers la page traitant les données -->
<!--<form action="insert_sujet.php" method="post"> -->
	<form class="form-horizontal" action="insert_sujet.php" method="post">
			<fieldset>
				<br>
			<!-- Form Name -->
			
			<br>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="auteur">Nom d'utilisateur</label>  
			  <div class="col-md-4">
			  <input id="Auteur" name= "auteur" type="text"  placeholder="" class="form-control input-md" value="<?php if (isset($_POST['auteur'])) echo htmlentities(trim($_POST['auteur'])); ?>">
			    
			  </div>
			</div>
			<br>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="titre">Titre du sujet</label>  
			  <div class="col-md-4">
			  <input id="titre" name="titre" type="text" placeholder="" class="form-control input-md" value="<?php if (isset($_POST['titre'])) echo htmlentities(trim($_POST['titre'])); ?>">
			    
			  </div>
			</div><br>
			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="message">Message</label>
			  <div class="col-md-4">                     
			    <textarea class="form-control" id="message" name="message" rows="10" cols="60"><?php if (isset($_POST['message'])) echo htmlentities(trim($_POST['message'])); ?>saisir votre message...</textarea>
			  </div>
			</div>

			</fieldset>
		<input type="submit" name ="go" class="btn btn-info" value="Poster">
</form>


<?php
// on affiche les erreurs éventuelles
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>
</html>