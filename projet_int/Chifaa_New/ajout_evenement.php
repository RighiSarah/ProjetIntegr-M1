<?php 
	if (!session_id()) session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'templates/includes/$head.html' ?>
	</head>

	<body>
		
		<!-- bar de menu -->
		<div class="navigation">
			<?php include 'templates/includes/$navigation.php' ?>
		</div>

		
		<div class="title_page">
		  <h1>&Eacute;v&eacute;nements</h1>
		</div>
		
		<div class="form_page">
		  <form action="evenement_admin.php" method="post" class="event">
		
			<input type="text" name="titre" size="50" placeholder="Titre de l'événement" class="col-md-12 form-control"/> <!--changement des classe de style -->
			<br/>
		
			<input size="30" type="date" name="date" placeholder="Date"  class="col-md-8 form-control"/>
			<input size="20" type="time" name="heure" placeholder="Heure"  class="col-md-4 form-control"/>
		
			<br/>
			<input type="text" name="lieu" size="50" placeholder="Lieu"  class="col-md-12 form-control"/>
			<br/>
			<input type="text" name="description" size="50"  placeholder="Description de l'événement"  class="col-md-12 form-control"/></li>
			<br/>
		
			<input type="submit" name = "val" value="Valider" class="btn btn-form"/>
		
		  </form>
		</div>
		
		<?php
			if(isset($_POST["val"])){
				$titre = $_POST["titre"];
				$date = $_POST["date"];
				$time = $_POST["heure"];
				$lieu = $_POST["lieu"];
				$description = $_POST["description"];
				
				$e = new Evenement();
				$e -> setSujet($titre);
				$e -> setDat($date);
				$e -> setTim($time);
				$e -> setLieu($lieu);
				$e -> setMsg($description);
				$e -> AjouterEvenement();
			}
			
		?>
		
		

		<!-- aller vers le haut -->
		<a href="#" id="toTop" style="display: inline;">
			<span id="toTopHover"></span>To Top
		</a>

	</body>
	
</html>