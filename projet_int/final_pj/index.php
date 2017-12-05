<?php session_start();

include 'connect_db.php';
//creer la connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error){
				die("Connection échoue: " . $conn->connect_error);
			}

			if (isset($_SESSION['ident'])) { // vérifier s'il est connecté !!!
				$user_check = $_SESSION['ident']; // reprendre l'id du compte connecté (si on ne vérifié pas avant d'appeller ca va donner une erreur !)
			} else {
				$user_check = null;
			}

			$ses_sql = "SELECT Role FROM personnes WHERE Identifiant = '".$user_check."'";
			$u = $conn->query($ses_sql)->fetch_assoc(); // fetch_assoc remplace le code en commmentaire
			//echo $ses_sql;
			if($u !== FALSE){
				// Pas besoin de faire une boucle pour récuperer une seule valeur, fetch_assoc suffit pour récupérer le role souhaité
				/* $events = mysqli_query($conn,$ses_sql) or die (mysqli_error($conn));

				$array = array();

				while ($row = mysqli_fetch_assoc($events)) {
					$array[] = $row;
				} */

				// $user_role = $array[0]['Role'];
				$user_role = $u['Role']; 

				if( $user_role == 1 or $user_role == 0){
         			$_SESSION['login_role'] = $user_role;
				}
			} else {
				echo "Erreur: " .$ses_sql. "<br>" .$conn->error;
			}
			$conn->close();
?>


<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'templates/includes/$head.html' ?>
	</head>

	<body>

		<div class="navigation">
			<?php include 'templates/includes/$navigation.php' ?>
		</div>

		<div class="cont">
			<div id="body">
				<div class="banner" id="home">
					<?php include 'templates/includes/$banner.html' ?>
				</div>

			<!--les boutons (devenir bénévole, contact , faire une visite)-->	
      		<div class="container-fluid">
        		<div class="row buttons">
                <div class="box1 shadowbox col-md-4"><a href="inscription.php"><i class="fa fa-handshake-o fa-5x"></i><br/>Devenir bénévole</a></div>
          			<div class="box2 shadowbox col-md-4"><a href="Visite.php"><i class="fa fa-bed fa-5x"></i><br/>Prévoir une visite</a></div>
          			<div class="box3 shadowbox col-md-4"><a href="contact.php"><i class="fa fa-envelope-o fa-5x"></i><br/>Contact</a></div>
        		</div>
      		</div>

				<section id="principe">
					<div class="container">
						<div class="row">
							<div class="principe">
								<h1>Principe </h1>
								<p>
									Notre principe:
									
								</p>
							</div>
						</div>
					</div>
				</section>


				<section id="Valeurs">
					<div class="container">
						<div class="row">
							<div class="valeurs">
								<h1> Valeurs </h1>
							</div>
						</div>
					</div>
				</section>

				<section id="actions">
					<div class="container">
						<div class="row">
							<div class="Nosaction">
								<h1> Nos actions </h1>
							</div>
						</div>
					</div>
				</section>


				<section id="who">
					<div class="container">
						<div class="row">
							<div class="Quisommes">
								<h1> Qui sommes-nous ? </h1>
							</div>
						</div>
					</div>
				</section>
			</div>


			<div class="footer">
				<?php include 'templates/includes/$footpage.html' ?>
			</div>

		</div>
		<script type="text/javascript">
			function ModifierPrincipe(editing) {
				// Lorsqu'on clique sur le bouton pour modifier
				if (editing) {
					// js:  document.getElementById(principe-content).
					$('#principe-content').css('display','none'); // On cache le contenu de principe
					$('#principe-content-edit').html("<textarea id='principeval' style='width:100%; height:500px'>"+$('#principe-content').html()+"</textarea>"); // On rajoute textarea avec le contenu de principe
					$('#principe-content-edit').css('display','block'); // On active la div du textarea au cas où elle a été caché par une modification précédente
					$('#editprincipe').attr('onclick','ModifierPrincipe(false)'); // On change le mode du bouton
				} else { // Lors qu'il reclique sur le bouton pour terminer la modif
					$('#principe-content').html($('#principeval').val()); // On met le contenu du textarea dans la balise principe
					$('#principe-content').css('display','block'); // On réactive qu'on a caché précédement
					$('#principe-content-edit').css('display','none'); // On désactive (cache) du coup le textarea
					$('#editprincipe').attr('onclick','ModifierPrincipe(true)'); // On change le mode du bouton
				}
			}
			function ModifierValeurs(editing) {
				
				if (editing) {
					// js:  document.getElementById(principe-content).
					$('#valeurs-content').css('display','none'); // On cache le contenu de valeurs
					$('#valeurs-content-edit').html("<textarea id='valeursval' style='width:100%; height:500px'>"+$('#valeurs-content').html()+"</textarea>"); // On rajoute textarea avec le contenu de valeurs
					$('#valeurs-content-edit').css('display','block'); // On active la div du textarea au cas où elle a été caché par une modification précédente
					$('#editvaleurs').attr('onclick','ModifierValeurs(false)'); // On change le mode du bouton
				} else { // Lors qu'il reclique sur le bouton pour terminer la modif
					$('#valeurs-content').html($('#valeursval').val()); // On met le contenu du textarea dans la balise valeurs
					$('#valeurs-content').css('display','block'); // On réactive qu'on a caché précédement
					$('#valeurs-content-edit').css('display','none'); // On désactive (cache) du coup le textarea
					$('#editvaleurs').attr('onclick','ModifierValeurs(true)'); // On change le mode du bouton
				}
			}
			function ModifierActions(editing) {
				
				if (editing) {
					// js:  document.getElementById(principe-content).
					$('#actions-content').css('display','none'); // On cache le contenu de actions
					$('#actions-content-edit').html("<textarea id='actionsval' style='width:100%; height:500px'>"+$('#actions-content').html()+"</textarea>"); // On rajoute textarea avec le contenu de actions
					$('#actions-content-edit').css('display','block'); // On active la div du textarea au cas où elle a été caché par une modification précédente
					$('#editactions').attr('onclick','ModifierActions(false)'); // On change le mode du bouton
				} else { // Lors qu'il reclique sur le bouton pour terminer la modif
					$('#actions-content').html($('#actionsval').val()); // On met le contenu du textarea dans la balise actions
					$('#actions-content').css('display','block'); // On réactive qu'on a caché précédement
					$('#actions-content-edit').css('display','none'); // On désactive (cache) du coup le textarea
					$('#editactions').attr('onclick','ModifierActions(true)'); // On change le mode du bouton
				}
			}
			function ModifierWho(editing) {
				
				if (editing) {
					// js:  document.getElementById(who-content).
					$('#who-content').css('display','none'); // On cache le contenu de who
					$('#who-content-edit').html("<textarea id='whoval' style='width:100%; height:500px'>"+$('#who-content').html()+"</textarea>"); // On rajoute textarea avec le contenu de who
					$('#who-content-edit').css('display','block'); // On active la div du textarea au cas où elle a été caché par une modification précédente
					$('#editwho').attr('onclick','ModifierWho(false)'); // On change le mode du bouton
				} else { // Lors qu'il reclique sur le bouton pour terminer la modif
					$('#who-content').html($('#whoval').val()); // On met le contenu du textarea dans la balise who
					$('#who-content').css('display','block'); // On réactive qu'on a caché précédement
					$('#who-content-edit').css('display','none'); // On désactive (cache) du coup le textarea
					$('#editwho').attr('onclick','ModifierWho(true)'); // On change le mode du bouton
				}
			}
		</script>
	</body>
</html>
