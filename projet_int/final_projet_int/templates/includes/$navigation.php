  <div class="navigation clearfix"> 
  	<div class="logo">
  	    <a href="index.php"><img src="images/logo.png" alt="Chifaa"></a>
  	</div>
  	<div class="menu">
  		<div class="dropdown">
  			<a href="index.php">PRÉSENTATION</a>
  			 <div class="dropdown-content">
  			    <a href="index.php#principe">Principe</a>
  			    <a href="index.php#Valeurs">Valeurs</a>
  			    <a href="index.php#actions">Nos actions</a>
  			    <a href="index.php#who">Qui sommes-nous ?</a>
  			</div>
  		</div>
  		<div class="dropdown">
  			<a href="#">NOUS AIDER</a>
  			<div class="dropdown-content">
  				<a href="Visite.php">Prévoir une visite</a>
  				<a href="Inscription.php">Devenir bénévole</a>
  			</div>
  		</div>
  		<span><a href="contact.php">CONTACT</a></span>
  		<span><a href="partenaire.php">PARTENAIRES</a></span>
  	</div>


  	<div class="login">
      <?php if (isset($_SESSION['ident'])): // connected ?>
        <div class="dropdown">
    			<a href="#">ESPACE MEMBRE</a>
    			 <div class="dropdown-content">
    			    <a href="#">Carnet d'adresse</a>
              <a href='FAQ.php'>FAQ</a>
              <a href='evenement_admin.php'>&Eacute;v&eacute;nements</a>
    			</div>
    		</div>
      <a> / </a><a href="deconnexion.php">Se déconnecter &nbsp;<i class="fa fa-times"></i></a>
      <?php endif; ?>

      <?php if (!isset($_SESSION['ident'])): // not connected ?>
        <a href="connexion.php"><i class="fa fa-user"></i> &nbsp; Se Connecter</a>
      <?php endif; ?>

  	</div>
  </div>
