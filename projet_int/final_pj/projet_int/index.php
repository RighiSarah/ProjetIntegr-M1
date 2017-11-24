
<?php session_start();?>
<!--
Author: Boutaina.Didioui
-->
<?php

require 'models/connexion.php' ;
if(isset($_POST['env'])){
    $mail = $_POST["mail"]; 
    $mpass =  $_POST["mpass"];
        $v = new Connexion();
        $v ->setMail($mail);
        $v->setPasswrd($mpass);
        $identifiant = $v->verifiIdentite();
        if ($identifiant == null){
            //echo "header";
            header ("Location: connexion.php?tent=1");
        }else{

            $_SESSION['ident'] = $identifiant;
            
            //echo "je suis ".$_SESSION["ident"];
        }     
}	 
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

				<section id="principe">
					<div class="container">
						<div class="row">
							<div class="principe">
								<h1>Principe </h1>
								<p> 
									Notre principe:
									lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum umlorem ipsum 
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

				<section id="Nos actions">
					<div class="container">
						<div class="row">
							<div class="Nosaction">
								<h1> Nos actions </h1>
							</div>
						</div>	
					</div>
				</section>


				<section id="Qui sommes-nous?">
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

			<script src="https://use.fontawesome.com/8c182752b4.js"></script>
		</div>
	</body>
</html>