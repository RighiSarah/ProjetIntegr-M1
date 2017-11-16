<?php
class Inscription{
  class Inscription {
    //put your code here
     private $Nom;
     Private $Prenom;
     Private $Telephone;
     Private $Passwrd;
     Private $Partage;
     Private $Mail;
	 
  public  function DemandeInscription(){
       require("connect_db.php");
       if(($Nom != "" ) && ($Prenom != "" ) && ($Passwrd != "" ) && ($Telephone!= "" ) && ($Partege != "" ) && ($Mail != "" )){
				$conn = new mysqli($servername,$username, $password,$dbname);
				if($conn != null){
				
	       $stmt = $conn->prepare("INSERT INTO PERSONNES values (:nom,:prenom,:password,:telephone,:partage,:mail");
				   $stmt->bindParam (':nom',this -> $Nom);
				   $stmt->bindParam (':prenom',this->$Prenom);
				   $stmt->bindParam (':password',this->$Passwrd);
				   $stmt->bindParam (':telephone',this->$Telephone);
				   $stmt->bindParam (':partage',this->$Partage);
				   $stmt->bindParam (':mail',this->$Mail);
				   $stmt->execute();
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
		  $stmt->bindParam (':identifiant',this -> $Nom);
          $stmt->execute();
         }
		 $conn ->close();
  }
 public  function ValidationInscription($identifiant){
      $conn = new mysqli($servername,$username, $password,$dbname);
	  if($conn !=null){
          $stmt = $conn->prepare("update personnes set ivalide = 1
                        WHERE Personnes.identifiant =:identifiant ");
		  $stmt->bindParam (':mail',this->$identifiant;
          $stmt->execute();
         }
		 $conn ->close();
    }
    return $doc;
  }

}
?>

