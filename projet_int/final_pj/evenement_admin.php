<?php 
session_start(); 
ini_set('display_errors', 1); //afficher les warnings

if (isset($_POST['supp'])or isset($_POST['modif'])){
	    $redirection = $_SERVER['PHP_SELF'];
	    header("Location:$redirection");
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'templates/includes/$head.html' ?>

	</head>

	<body>

		<?php include 'connect_db.php' ?> 
		<?php
			
			
			//creer la connection 
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error){
				die("Connection échoue: " . $conn->connect_error);
			}

		?>
		<!-- bar de menu -->
		<div class="navigation">
			<?php include 'templates/includes/$navigation.php' ?>
		</div>

		<div class="cont">
			<div id="body">
				<div class="title_page">
					<h1>&Eacute;v&eacute;nements</h1>
				</div>

				<?php 
					if ($_SESSION['login_role']== 1){
						echo "<form action='evenement.php' style='padding-left:9em; font-size:20px;'>
		    				<input type='submit' value='&#xf067;' class='btn-form' />
						</form>";
					}
				?>
		
				<!-- afficher les evenements depuis la BDD -->

				<?php
				/*$t = mysqli_real_escape_string($conn, $_POST['titre']);
				$d = mysqli_real_escape_string($conn, $_POST['date']);
				$h = mysqli_real_escape_string($conn, $_POST['heure']);
				$de = mysqli_real_escape_string($conn, $_POST['description']);
				$l = mysqli_real_escape_string($conn, $_POST['lieu']);*/


					if (isset($_POST['titre']) and isset($_POST['date']) and isset($_POST['heure']) and isset($_POST['description']) and isset($_POST['lieu'])){
						//$sql = "INSERT INTO evenements VALUES (DEFAULT,'" .$_POST['titre']."','".$_POST['date']."','".$_POST['heure']."','".$_POST['description']."','".$_POST['lieu']."')";
						//$sql = "INSERT INTO evennements(Titre,Date,Heure,Objectif,Lieu) VALUES ('$t','$d','$h','$de','$l')";
						$sql = "INSERT INTO evenements (identifiant,Titre,Date,Heure,Objectif,Lieu) VALUES (DEFAULT,?, ?, ?, ?,?)";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("sssss", $_POST['titre'], $_POST['date'],$_POST['heure'],$_POST['description'],$_POST['lieu']);
						$events = $stmt->execute();
					}else{

						$sql = "SELECT * FROM evenements ORDER BY identifiant DESC";
						$events = mysqli_query($conn,$sql);
					}

					
					

					//if(mysqli_query($conn,$sql) !== FALSE){
					if($events !== FALSE){
						
						$events = mysqli_query($conn,"SELECT * FROM evenements ORDER BY identifiant DESC");
						$array = array();

						while ($row = mysqli_fetch_assoc($events)) {
							$array[] = $row;
						}

						if (sizeof($array)==0){

							echo "<p style='text-align:center; font-size:150%;'>Il n' y a pas de nouvel &eacute;v&eacute;nement</p>";

						}else if (sizeof($array)>0){
							echo "<table style='padding-top: 3em; width: 60%; margin:auto;'>";

							for ($i=0; $i < sizeof($array); $i++){
								if ($array[$i]!=""){
									echo '<tr>
											<td rowspan="2" class="title">'.$array[$i]["Titre"].'</td>
											<td>'. $array[$i]["Date"].'</td>';
										if ($_SESSION['login_role'] == 1){
											echo "<td rowspan='3' align='center'>
													<form action='event_modif.php' method='POST' style = 'width:100%;'>
														<input type='submit' name='mod' class='modif_supp' value='&#xf040;' />
														<input type='hidden' name='title_event' value='".str_replace("'","&#39;",$array[$i]["Titre"])."'/>
														<input type='hidden' name='date_event' value='".$array[$i]["Date"]."'/>
														<input type='hidden' name='heure_event' value='".$array[$i]["Heure"]."'/>
														<input type='hidden' name='lieu_event' value='".str_replace("'","&#39;",$array[$i]["Lieu"])."'/>
														<input type='hidden' name='obj_event' value='".str_replace("'","&#39;",$array[$i]["Objectif"])."'/>
														<input type='hidden' name='id_event' value='".$array[$i]["identifiant"]."'/>
													</form>

													<form action='' method='POST' style = 'width:100%;'>
			    										<input type='submit' name='supp' class='modif_supp' value='&#xf1f8;' />
			    										<input type='hidden' name='id_event' value='".$array[$i]["identifiant"]."'/>
													</form>
												</td>";
										}
									echo '</tr>
										<tr>
											<td>'.$array[$i]["Heure"].'</td>
										</tr>
										<tr>
											<td>'.$array[$i]["Lieu"].'</td>
										</tr>
										<tr>
											<td colspan="2" class="obj">'.$array[$i]["Objectif"].'</td>
										</tr>
										<tr>
											<td colspan="3"><hr/></td>
										</tr>';
								}
							}

							echo '</table>';

						}

					} else {
						echo "Erreur: " .$sql. "<br>" .$conn->error;
					}

					//echo $_POST['titre'] . '<br/>' . $_POST['date'] .'	'. $_POST['heure'] .'<br/>' . $_POST['description'];
					
					if (isset($_POST['supp'])) {
       					mysqli_query($conn,'DELETE FROM evenements WHERE identifiant = '.$_POST['id_event'].';');
              			echo $conn->error;
					}

					

				     if(isset($_POST['modif'])){
				     	$id = $_POST['id_event'];
				        
				        //$req = "UPDATE evenements SET Titre = '".$_POST['titre_mo']."',Date ='".$_POST['date_mo']."',Heure ='".$_POST['heure_mo']."',Lieu='".$_POST['lieu_mo']."',Objectif ='".$_POST['description_mo']."' WHERE identifiant ='".$_POST['id_event']."' ";

				        $req = "UPDATE evenements SET Titre = ? ,Date =? ,Heure =? ,Lieu=? ,Objectif = ? WHERE identifiant =?";
						$stmt = $conn->prepare($req);
						$stmt->bind_param("sssssi", $_POST['titre_mo'], $_POST['date_mo'],$_POST['heure_mo'],$_POST['lieu_mo'],$_POST['description_mo'],$_POST['id_event']);
						$events = $stmt->execute();
				    }

        			$conn->close();
      
				?>
			</div>

			<!--footer pied de page 
			<div class="footer">
				<?php //include 'templates/includes/$footpage.html' ?>
			</div>

			<script src="https://use.fontawesome.com/8c182752b4.js"></script>-->
		</div>
		
	</body>
	
</html>