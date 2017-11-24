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

			$user_check = $_SESSION['ident'];
			$ses_sql = "SELECT Role FROM personnes WHERE Identifiant = '".$user_check."'";
			//echo $ses_sql;
			if($conn->query($ses_sql) !== FALSE){
				
				$events = mysqli_query($conn,$ses_sql) or die (mysqli_error($conn));
				
				$array = array();

				while ($row = mysqli_fetch_assoc($events)) {
					$array[] = $row;
				}
				
				$user_role = $array[0]['Role'];
				//echo $user_role;
				if( $user_role === 1 or $user_role === 0){
         			$_SESSION['login_role'] = $user_role;
				}
			} else {
				echo "Erreur: " .$ses_sql. "<br>" .$conn->error;
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
					if ($user_role == 1){
						echo "<form action='evenement.php' style='padding-left:9em; font-size:20px;'>
		    				<input type='submit' value='&#xf067;' />
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
						$sql = "INSERT INTO evenements VALUES (DEFAULT,'" .$_POST['titre']."','".$_POST['date']."','".$_POST['heure']."','".$_POST['description']."','".$_POST['lieu']."')";
						//$sql = "INSERT INTO evennements(Titre,Date,Heure,Objectif,Lieu) VALUES ('$t','$d','$h','$de','$l')";
						
					}else{

						$sql = "SELECT * FROM evenements ORDER BY identifiant DESC";
					}
					
					
					if(mysqli_query($conn,$sql) !== FALSE){
						
						$events = mysqli_query($conn,"SELECT * FROM evenements ORDER BY identifiant DESC");
						$array = array();

						while ($row = mysqli_fetch_assoc($events)) {
							$array[] = $row;
						}

						if (sizeof($array)==0){

							echo "<p style='text-align:center; font-size:150%;'>Il n' y a pas de nouvel &eacute;v&eacute;nement</p>";

						}else if (sizeof($array)>0 AND sizeof($array)<=3){
							echo '<table>';

							for ($i=0; $i < sizeof($array); $i++){
								if ($array[$i]!=""){
									echo '<tr>
											<td rowspan="2" class="title">'.$array[$i]["Titre"].'</td>
											<td>'. $array[$i]["Date"].'</td>';
										if ($user_role == 1){
											echo "<td rowspan='3' align='center'>
													<form action='event_modif.php' method='POST' style = 'width:100%;'>
														<input type='submit' name='mod' class='btn_icon' value='&#xf040;' />
														<input type='hidden' name='title_event' value='".$array[$i]["Titre"]."'/>
														<input type='hidden' name='date_event' value='".$array[$i]["Date"]."'/>
														<input type='hidden' name='heure_event' value='".$array[$i]["Heure"]."'/>
														<input type='hidden' name='lieu_event' value='".$array[$i]["Lieu"]."'/>
														<input type='hidden' name='obj_event' value='".$array[$i]["Objectif"]."'/>
														<input type='hidden' name='id_event' value='".$array[$i]["identifiant"]."'/>
													</form>

													<form action='' method='POST' style = 'width:100%;'>
			    										<input type='submit' name='supp' class='btn_icon' value='&#xf1f8;' />
			    										<input type='hidden' name='id_event' value='".$array[$i]["identifiant"]."'/>
													</form>
												</td>";
										}
									echo "</tr>
										<tr>
											<td>".$array[$i]["Heure"]."</td>
										</tr>
										<tr>
											<td>".$array[$i]["Lieu"]."</td>
										</tr>
										<tr>
											<td colspan='2' class='obj'>".$array[$i]["Objectif"]."</td>
										</tr>
										<tr>
											<td colspan='3'><hr/></td>
										</tr>";
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
				        
				        $req = "UPDATE evenements SET Titre = '".$_POST['titre_mo']."',Date ='".$_POST['date_mo']."',Heure ='".$_POST['heure_mo']."',Lieu='".$_POST['lieu_mo']."',Objectif ='".$_POST['description_mo']."' WHERE identifiant ='".$_POST['id_event']."' ";

				        mysqli_query($conn,$req);
				        echo $conn->error;
				    }

        			$conn->close();
      
				?>
			</div>

			<!--footer pied de page 
			<div class="footer">
				<?php include 'templates/includes/$footpage.html' ?>
			</div>

			<script src="https://use.fontawesome.com/8c182752b4.js"></script>-->
		</div>
		
	</body>
	
</html>