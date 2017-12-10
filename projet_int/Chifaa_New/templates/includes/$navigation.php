  <div class="navigation clearfix"> 
  	<div class="logo">
  	    <a href="index.php"><img src="images/logo2.png" alt="Chifaa"></a>
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
  				<?php
          			if (!(isset($_SESSION['ident']))){
            			{
              				echo "<a href=\"Inscription.php\">Devenir bénévole</a>";
            			}
          			}
          		?>
  				
  			</div>
  		</div>
  		<?php
			if (!(isset($_SESSION['ident']))||(isset($_SESSION['ident']) && $_SESSION['login_role'] == 0)){
				{
					echo "<span><a href=\"contact.php\">CONTACT</a></span>";
				}
			}
		?>
  		
  		<span><a href="partenaire.php">PARTENAIRES</a></span>
  	</div>


  	<div class="login">
     
     <!--espace administrateur-->
        <?php
          if (isset($_SESSION['ident'])){
            if ($_SESSION['login_role']==1){
              echo "<div class='dropdown'>
                      <a href='#'>ADMIN</a>
                      <div class='dropdown-content'>
                        <a href='val_ins.php'>DEMANDE INSCRIPTIONS</a>
                        <a href='val_vis.php'>DEMANDE VISITES</a>
                        <a href='messagerie.php'>MESSAGERIE</a>
                      </div>
                    </div>";
              echo "<a> / </a>";
            }
          }
        ?>
      <!--espace membre affiche seulement pour les membres-->
        <?php 
          if(isset($_SESSION['ident'])){
            echo "<div class='dropdown'>
                    <a href='#'>ESPACE MEMBRE</a>
                    <div class='dropdown-content'>
                      <a href='carnet_adresse.php'>CARNET D'ADRESSE</a>
                      <a href='FAQ.php'>FORUM</a>
                      <a href='evenement_admin.php'>&Eacute;V&Eacute;NEMENTS</a>
                    </div>
                  </div>";
            echo "<a> / </a>";
          }
        ?>

      

      <!--se deconnecter -->
      <?php
        if (isset($_SESSION["ident"])){
          echo "<a href='deconnexion.php'>Se déconnecter &nbsp;<i class='fa fa-times'></i></a>";
        }else{
          echo "<a href='connexion.php'><i class='fa fa-user'></i> &nbsp; Se Connecter</a>";
        }
      ?>

  	</div>
  </div>
