<?php session_start();?>

<!DOCTYPE html>
<html>

	<head>
		<?php include 'templates/includes/$head.html' ?>
	<style>
            #myInput {
                background-image: url('/css/searchicon.png'); /* Add a search icon to input */
                background-position: 10px 12px; /* Position the search icon */
                background-repeat: no-repeat; /* Do not repeat the icon image */
                width: 100%; /* Full-width */
                font-size: 16px; /* Increase font-size */
                padding: 12px 20px 12px 40px; /* Add some padding */
                border: 1px solid #ddd; /* Add a grey border */
                margin-bottom: 12px; /* Add some space below the input */
            }
        </style>
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
				   </br>
				   <a href="partenaire.php" class="btn btn-block btn-lg btn-primary"><i class="fa fa-globe"></i> Nos Partenaires</a>
				   </div>        
			   </div>
		   </div>
	   </div>
	   </br>
		<div class="cont">
			<div id="body">
				<section id="partenaire">
						<div class="container">
							<div class="partenaire">
								<div class="row">
										<p style="text-align:center;">
											<a href="http://www.albatros69.org/" target="_blank"><img src="images/Capture.PNG"></a>
											<a href="http://www.olivierdessages.com/" target="_blank"><img src="images/olivier.jpeg"></a>
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
