<?php session_start();?>

<!DOCTYPE html>
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
				<section id="partenaire">
						<div class="container">
							<div class="partenaire">
								<div class="row">
									<div class="col-md-12">
										<h1> Nos partenaires </h1>
										<br/>
										<p style="text-align:center;">
											<img src="images/capture.png">
											<img src="https://placehold.it/150x50">
											<img src="https://placehold.it/150x50">
											<img src="https://placehold.it/150x50">
											<img src="https://placehold.it/150x50">
										</p>
									</div>
								</div>
							</div>
						</div>
				</section>
			</div>



			<!-- footer -->

			<div class="footer">
				<?php include 'templates/includes/$footpage.html' ?>
				<script src="https://use.fontawesome.com/8c182752b4.js"></script>
			</div>
		</div>



	</body>
</html>
