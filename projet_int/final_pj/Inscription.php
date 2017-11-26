<?php session_start(); ?>

<!DOCTYPE html>

<html>

    <head>
        <?php require 'models/gestion_ins.php' ?>
        <?php include 'templates/includes/$head.html' ?>

    </head>

    <body>

         <div class="navigation">

            <?php include 'templates/includes/$navigation.php' ?>

         </div>


		 <div class="cont">
            <div id="body">
                <div class="title_page">
                  <h1> Demande Inscription </h1>
                </div>

                <div class="form_page">
                    <form  action="" method="POST" enctype="multipart/form-data" id="ins" name="ins" onSubmit="return VerifyPassword()">

                        <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" style = "width:400px" required>

                        <input type="text" class="form-control" id="prenom" placeholder=" Pr&eacute;nom" name="prenom" style = "width:400px" required>

                        <input type="password" class="form-control" id="mpass1" placeholder="Mot de passe" name="mpass1" style = "width:400px" required>

                        <input type="password" class="form-control" id="mpass2" placeholder=" Confirmer" name="mpass2" style = "width:400px" required>

                        <input type="mail" class="form-control" id="mail" placeholder="Adresse Mail" name="mail" style = "width:400px" required>


                        <input type="mail" class="form-control" id="addr" placeholder="Adresse" name="addr" style = "width:400px" required>

                        <input type="text" class="form-control" id="tel" placeholder="Telephone" name="telephone" style = "width:400px">

                        <div style="line-height: 2em;">
                           <h4>Voulez vous partagez vos informations avec les autres membres ?</h4>
                           <input type="radio" id="partage"  name="partage" value="1" checked="true" /><label> &nbsp;Oui</label>
                           <input type="radio" id="partage"  name="partage" value ="0" /><label> &nbsp;Non</label>
                           <br/>
                           <input type="submit" class="btn btn-info" name ="env" id= "env" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>

            <!-- footer -->
            <div class="footer">
                <?php include 'templates/includes/$footpage.html' ?>
                <script src="https://use.fontawesome.com/8c182752b4.js"></script>
            </div>

        </div>
    </body>
<?php
if(isset($_POST['env'])){
   $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mpass1 = $_POST["mpass1"];
    $mpass2 = $_POST["mpass2"];
    $mail = $_POST["mail"];
    $telephone =  $_POST["telephone"];
    $partage =  $_POST["partage"];
    $adresse = $_POST["addr"];

        $p = new Inscription();
        $p ->setNom($nom);
        $p ->setPrenom($prenom);
        $p->setPasswrd($mpass1);
        $p ->setTelephone($telephone);
        $p ->setAdresse($adresse);
        //if($partage==="oui") $partage = 1; else $partage =0;
        $p ->setPartage($partage);
        $p ->setMail($mail);
        $p ->DemandeInscription();

}
?>
<script type="text/javascript">
  function VerifyPassword(){
      var pass1= document.getElementById("mpass1").value;
      var pass2 = document.getElementById("mpass2").value;

      if((pass1 != "") && (pass2 != "")){
          if(pass1 !=  pass2 )
          {
          alert("Veuillez vérifier la saisie des mots de passe");
          return false;

         }else
         return true;
        }
    }

</script>

</html>
