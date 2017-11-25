<!-- <img src="logo.jpg" width="50" height="50">
<div class="dropdown">
  <button class="dropbtn">PRÉSENTATION</button>
  <div class="dropdown-content">
      <a>Principe</a>
      <a>Valeurs</a>
      <a>Nos actions</a>
      <a>Qui sommes-nous ?</a>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn">AIDEZ-NOUS</button>
  <div class="dropdown-content">
    <a>Prévoir une visite</a>
    <a>Devenir bénévole</a>
    </div>
</div>
        
<a href="contact.php">CONTACT</a>
<a>PARTENAIRES</a>-->
<div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="Chifaa"></a>
</div>


<?php 
    if(isset($_SESSION['ident'])){
      echo "<div class='dropdown'>
              <a href='#'>ESPACE MEMBRE</a>
              <div class='dropdown-content'>
                <a href='#'>Carnet d'adresse</a>
                <a href='FAQ.php'>FAQ</a>
                <a href='evenement_admin.php'>&Eacute;v&eacute;nements</a>
              </div>
            </div>";
  }
  ?>
<div class="dropdown">
  <a href="index.php">PRÉSENTATION</a>
  <div class="dropdown-content">
      <a href="index.php#principe">Principe</a>
      <a href="index.php#Valeurs">Valeurs</a>
      <a href="index.php#Nos actions">Nos actions</a>
      <a href="index.php#Qui sommes-nous?">Qui sommes-nous ?</a>
  </div>
</div>

<?php

    if ($_SESSION['login_role']==1){
            echo "<div class='dropdown'>
                    <a href='#''>VALIDATION</a>
                    <div class='dropdown-content'>
                      <a href='val_ins.php'>Des inscriptions</a>
                      <a href='val_vis.php'>Des visites</a>
                    </div>
                  </div>";
    }else if($_SESSION['login_role']==0){
        echo "<div class='dropdown'>
                <a href='Visite.php'>Prévoir une visite</a>
              </div>";
      
      
    }else{
      echo "<div class='dropdown'>
            <a href='#''>AIDEZ-NOUS</a>
            <div class='dropdown-content'>
              <a href='Visite.php>Prévoir une visite</a>
              <a href='Inscription.php'>Devenir bénévole</a>
            </div>
          </div>";
    }
?>

              
<a href="contact.php">CONTACT</a>
<a href="partenaire.php">PARTENAIRES</a>

<!--bouton deconnexion et connexion -->
  <?php
    if (isset($_SESSION["ident"])){
      echo "<a href='deconnexion.php'><i class='fa fa-sign-out' style='font-size:30px;' aria-hidden='true'></i></a>";
      
    }else{
      echo "<a href='connexion.php'><i class='fa fa-sign-in' style='font-size:30px;'aria-hidden='true'></i></a>";
      //echo "<div class='login'><a href='connexion.php'>Se Connecter</a><a> / </a><a href='Inscription.php'>Sinscrire</a> &nbsp;<a><i class='fa fa-user'></i></a></div>";
    }

  ?>