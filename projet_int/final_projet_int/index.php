
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
	</body>
</html>
