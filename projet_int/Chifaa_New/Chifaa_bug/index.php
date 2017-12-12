<?php session_start();
ini_set('display_errors', 1);
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
			
			if($u !== FALSE){
			
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
          			<div class="box2 shadowbox col-md-4"><a href="Visite.php"><i class="fa fa-users fa-5x"></i><br/>Prévoir une visite</a></div>
          			<div class="box3 shadowbox col-md-4"><a href="contact.php"><i class="fa fa-envelope-o fa-5x"></i><br/>Contact</a></div>
        		</div>
      		</div>

				<section id="principe">
					<div class="container">
						<div class="row">
							<div class="principe">
								<h1>Principe</h1>
								<!--ici les boutons modification-->
								
								<?php  
			
								//creer la connection 
								$conn = new mysqli($servername, $username, $password, $dbname);

								if ($conn->connect_error){
									die("Connection échoue: " . $conn->connect_error);
								}

								if ($_SESSION['login_role']== 1){
									echo "<form action='index.php#principe' method='POST' style='float:right; display:inline;'>
										<input type='submit' name='modif_principe' class='modif_supp' style ='background-color:white;' value='&#xf040;' />
									</form>";
								}
								?>

								<br/>
								<br/>
								
									<?php
										if (isset($_POST['val_principe'])){
											$sql = "UPDATE contenu SET principe = ?";
											$stmt = $conn->prepare($sql);
											$stmt->bind_param("s", $_POST['principe']);
											$princ = $stmt->execute();
										}

										if (isset($_POST['modif_principe'])){
											$sql = "SELECT principe FROM contenu";
											$princ = mysqli_query($conn,$sql);

											echo "<form action='index.php#principe' method='POST'>
													<textarea name='principe' rows='6' cols='10' class='form-control' placeholder='Modifier la section Principe'>".mysqli_fetch_assoc($princ)['principe']."</textarea></br>
													<input type='submit' name = 'val_principe' value='Valider' class='btn btn-lg btn-primary'/>

												</form>";

										}else{
										
											$sql = "SELECT principe FROM contenu";
											$princ = mysqli_query($conn,$sql);
											echo mysqli_fetch_assoc($princ)['principe'];

										}

										$conn->close();
									?>
									
							</div>
						</div>
					</div>
				</section>


				<section id="Valeurs">
					<div class="container">
						<div class="row">
							<div class="valeurs">
								<h1> Valeurs </h1>
								<!--ici les boutons modification-->
								
								<?php  
			
								//creer la connection 
								$conn = new mysqli($servername, $username, $password, $dbname);

								if ($conn->connect_error){
									die("Connection échoue: " . $conn->connect_error);
								}

								if ($_SESSION['login_role']== 1){
									echo "<form action='index.php#Valeurs' method='POST' style='float:right; display:inline;'>
										<input type='submit' name='modif_valeurs' class='modif_supp' style ='background-color:white;' value='&#xf040;' />
									</form>";
								}
								?>

								<br/>
								<br/>
									<?php
										if (isset($_POST['val_valeurs'])){
											$sql = "UPDATE contenu SET valeurs = ?";
											$stmt = $conn->prepare($sql);
											$stmt->bind_param("s", $_POST['valeurs']);
											$value = $stmt->execute();
										}

										if (isset($_POST['modif_valeurs'])){
											$sql = "SELECT valeurs FROM contenu";
											$value = mysqli_query($conn,$sql);

											echo "<form action='index.php#Valeurs' method='POST'>
													<textarea name='valeurs' rows='6' cols='10' class='form-control' placeholder='Modifier la section Valeurs'>".mysqli_fetch_assoc($value)['valeurs']."</textarea></br>
													<input type='submit' name = 'val_valeurs' value='Valider' class='btn btn-lg btn-primary'/>
												</form>";

										}else{
										
											$sql = "SELECT valeurs FROM contenu";
											$value = mysqli_query($conn,$sql);
											echo mysqli_fetch_assoc($value)['valeurs'];

										}

										$conn->close();
									?>
							</div>
						</div>
					</div>
				</section>

				<section id="actions">
					<div class="container">
						<div class="row">
							<div class="Nosaction">
								<h1> Nos actions </h1>
								<!--ici les boutons -->
								<?php  
			
								//creer la connection 
								$conn = new mysqli($servername, $username, $password, $dbname);

								if ($conn->connect_error){
									die("Connection échoue: " . $conn->connect_error);
								}

								if ($_SESSION['login_role']== 1){
									echo "<form action='index.php#actions' method='POST' style='float:right; display:inline;'>
										<input type='submit' name='modif_actions' class='modif_supp' style ='background-color:white;' value='&#xf040;' />
									</form>";
								}
								?>

								<br/>
								<br/>

									<?php
										if (isset($_POST['val_actions'])){
											$sql = "UPDATE contenu SET actions = ?";
											$stmt = $conn->prepare($sql);
											$stmt->bind_param("s", $_POST['actions']);
											$act = $stmt->execute();
										}

										if (isset($_POST['modif_actions'])){
											$sql = "SELECT actions FROM contenu";
											$act = mysqli_query($conn,$sql);

											echo "<form action='index.php#actions' method='POST'>
													<textarea name='actions' rows='6' cols='10' class='form-control' placeholder='Modifier la section Nos actions'>".mysqli_fetch_assoc($act)['actions']."</textarea></br>
													<input type='submit' name = 'val_actions' value='Valider' class='btn btn-lg btn-primary'/>
												</form>";

										}else{
										
											$sql = "SELECT actions FROM contenu";
											$act = mysqli_query($conn,$sql);
											echo mysqli_fetch_assoc($act)['actions'];

										}

										$conn->close();
									?>
								
							</div>
						</div>
					</div>
				</section>


				<section id="who">
					<div class="container">
						<div class="row">
							<div class="Quisommes">
								<h1> Qui sommes-nous ? </h1>
								<!--ici les boutons -->
								<?php  
			
								//creer la connection 
								$conn = new mysqli($servername, $username, $password, $dbname);

								if ($conn->connect_error){
									die("Connection échoue: " . $conn->connect_error);
								}

								if ($_SESSION['login_role']== 1){
									echo "<form action='index.php#who' method='POST' style='float:right; display:inline;'>
										<input type='submit' name='modif_who' class='modif_supp' style ='background-color:white;' value='&#xf040;' />
									</form>";
								}
								?>

								<br/>
								<br/>
								
									<?php
										if (isset($_POST['val_who'])){
											$sql = "UPDATE contenu SET quisommesnous = ?";
											$stmt = $conn->prepare($sql);
											$stmt->bind_param("s", $_POST['who']);
											$who = $stmt->execute();
										}

										if (isset($_POST['modif_who'])){
											$sql = "SELECT quisommesnous FROM contenu";
											$who = mysqli_query($conn,$sql);

											echo "<form action='index.php#who' method='POST'>
													<textarea name='who' rows='6' cols='10' class='form-control' placeholder='Modifier la section Nos actions'>".mysqli_fetch_assoc($who)['quisommesnous']."</textarea></br>
													<input type='submit' name = 'val_who' value='Valider' class='btn btn-lg btn-primary'/>
												</form>";

										}else{
										
											$sql = "SELECT quisommesnous FROM contenu";
											$who = mysqli_query($conn,$sql);
											echo mysqli_fetch_assoc($who)['quisommesnous'];

										}

										$conn->close();
									?>
							</div>
						</div>
					</div>
				</section>
			</div>


			<div class="footer">
				<?php include 'templates/includes/$footpage.html' ?>
			</div>

		</div>
	</body>
</html>
