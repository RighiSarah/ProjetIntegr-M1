<?php
  class Inscription {
    //put your code here
     private $Nom;
     Private $Prenom;
     Private $Telephone;
     Private $Passwrd;
     Private $Partage;
     Private $Mail;
     Private $Adresse;
     Private $Valide;
     //---------------------Set et Get Nom-------------------------------------
     public function getNom(){
         return $this -> Nom;
     }
     public function setNom($nom){
         $this ->Nom = $nom;
        
     }
     //--------------------------------------------------------------------------
     public function getPrenom(){
         return $this -> Prenom;
     }
     public function setPrenom($prenom){
         $this ->Prenom = $prenom;
         
     }
     //-------------------------------------------------------------------------
     public function getTelephone(){
         return $this -> Telephone;
     }
     public function setTelephone($telephone){
         $this ->Telephone = $telephone;
          
     } 
     //-------------------------------------------------------------------------
     public function getPasswrd(){
         return $this -> Passwrd;
     }
     public function setPasswrd($passwrd){
         $this ->Passwrd = $passwrd;
          
     } 
     //-------------------------------------------------------------------------
     public function getPartage(){
         return $this -> Partage;
     }
     public function setPartage($partage){
         $this ->Partage = $partage;
          
     }
    //-------------------------------------------------------------------------
      public function getMail(){
         return $this -> Mail;
     }
     public function setMail($mail){
         $this ->Mail = $mail;
          
     }
     //---------------------------------------------------------------------------
     public function getAdresse(){
         return $this -> Adresse;
     }
     public function setAdresse($adresse){
         $this ->Adresse = $adresse;
     }
     public function getValide(){
         return $this -> Valide;
     }
     public function setValide($valide){
         $this ->Valide = $valide;
        
     }
     //---------------------------------------------------------------------------
  public function DemandeInscription(){
       require("connect_db.php");
       if(($this->Nom != "" ) && ($this->Prenom != "" ) && ($this->Passwrd!= "" ) && ($this->Telephone!= "" )
              && ($this->Partage != "" ) && ($this->Mail != "" )){
				$conn = new mysqli($servername,$username, $password,$dbname);
				if($conn != null){
				
        $checkmail = "SELECT * FROM personnes WHERE Mail ='".$this->Mail."'";
        
        $result = $conn->query($checkmail);

        if($result ->num_rows > 0) {
          echo '<script type="text/javascript">alert("Votre identifiant/email a déjà inscrit, veuillez choisir un autre.");
      </script>';
        }else{



	       $stmt = "INSERT INTO personnes(Identifiant,Nom,Prenom,Telephone,Mail,passwrd,Adresse,Partage,valide)"
      ."VALUES('".$this->Mail."','".$this->Nom."','".$this->Prenom."','".$this->Telephone."','".$this->Mail."','".$this->Passwrd."','".$this->Adresse."','".$this->Partage."','0')";
          
                         
                        
                
			if($conn->query($stmt))  echo '<script type="text/javascript">
        alert("Merci de vous inscrire, veuillez attendre la validation de l\'administrateur.");
      </script>';
                                 else echo "failed"; 
      }                           
                               
		}
                
		$conn -> close();
	   }
  }
  public  function ListeDemandeInscription(){
  require("connect_db.php");
  $conn = new mysqli($servername,$username, $password,$dbname);
  if($conn !=null){
          $stmt = "SELECT personnes.* FROM personnes WHERE Personnes.valide= 0";
          $liste = $conn->query($stmt);
         }
        
     $conn ->close();
     return $liste;
  }
  
 public  function ValidationInscription($identifiant){
      require("connect_db.php");
      $conn = new mysqli($servername,$username, $password,$dbname);
	  if($conn !=null){
              $stmt = "update personnes set Role = 0,valide = 1 WHERE personnes.identifiant = '".$identifiant."'";
              $conn -> query($stmt);
         }
         $conn ->close();
    }
    
public function GetPersonne($mail){
    $personne = new Inscription();
    return $personne;
}
  }?>