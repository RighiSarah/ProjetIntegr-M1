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

		
		<?php
			
			include 'templates/includes/$event_form.html'
		
		?>

		<!-- Ne pas afficher cette page au public -->
		<!-- banner -->

		
		

		<!-- aller vers le haut -->
		<a href="#" id="toTop" style="display: inline;">
			<span id="toTopHover"></span>To Top
		</a>

	</body>
	
</html>