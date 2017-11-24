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
     //---------------------------------------------------------------------------
  public function DemandeInscription(){
       require("connect_db.php");
       if(($this->Nom != "" ) && ($this->Prenom != "" ) && ($this->Passwrd!= "" ) && ($this->Telephone!= "" )
              && ($this->Partage != "" ) && ($this->Mail != "" )){
				$conn = new mysqli($servername,$username, $password,$dbname);
				if($conn != null){
				
	       $stmt = "INSERT INTO personnes(Identifiant,Nom,Prenom,Telephone,Mail,passwrd,Adresse,Partage)"
      ."VALUES('".$this->Mail."','".$this->Nom."','".$this->Prenom."','".$this->Telephone."','".$this->Mail."','".$this->Passwrd."','".$this->Adresse."','".$this->Partage."')";
                        
                
			if($conn->query($stmt)){  
        //echo "Success";
        $stmt = "INSERT INTO personnes(Identifiant,Role)"."VALUES('".$this->Mail."',0)";
        $conn->query($stmt);// or die(mysqli_error($conn));
      }//else echo "Failed"; 
                                 
      }

                
		$conn -> close();
	   }
    

  }
  
  public  function ListeDemandeInscription(){
  require("connect_db.php");
  $conn = new mysqli($servername,$username, $password,$dbname);
  if($conn !=null){
          $stmt = $conn->prepare("SELECT personnes.*
                        FROM personnes
                        WHERE Personnes.valide= 0 ");
          $stmt->execute();
         }
     $conn ->close();
  }
 public  function ValidationInscription($identifiant){
      $conn = new mysqli($servername,$username, $password,$dbname);
	  if($conn !=null){
          $stmt = $conn->prepare("UPDATE personnes SET ivalide = 1
                        WHERE Personnes.identifiant =:identifiant ");
		      $stmt->bindParam (':mail',$identifiant);
          $stmt->execute();
         }
         $conn ->close();
    }

public function GetPersonne($mail){
    $personne = new Inscription();
    return $personne;
}
  }
?>

