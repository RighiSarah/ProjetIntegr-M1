<?php
require ("gestion_ins.php");
class Visites extends \Inscription{
    //put your code here
    Private $Lieu;
    Private $Lien;
    Private $LienAutre;
    Private $Nom_patient;
    Private $Prenom_patient;
    
    //------------------------------------------------------------------------
     public function getLien(){
         return $this -> Lien;
     }
     public function setLien($lien){
         $this ->Lien= $lien;
         return $this;
     }
     //------------------------------------------------------------------------
     public function getLienAutre(){
         return $this -> LienAutre;
     }
     public function setLienAutre($lien_autre){
         $this ->LienAutre= $lien_autre;
         return $this;
     }
     
    //------------------------------------------------------------------------
     public function getLieu(){
         return $this -> Lieu;
     }
     public function setLieu($lieu){
         $this ->Lieu= $lieu;
         return $this;
     }
     //------------------------------------------------------------------------
     public function getPrenom_patient(){
         return $this -> Prenom_patient;
     }
     public function setPrenom_patient($prenom_patient){
         $this ->Prenom_patient= $prenom_patient;
         return $this;
     }
     //------------------------------------------------------------------------
     public function getNom_patient(){
         return $this -> Nom_patient;
     }
     public function setNom_patient($nom_patient){
         $this ->Nom_patient= $nom_patient;
         return $this;
     }
	//------------------------------------------------------------------------
     public function Prevoir_visite(){
     require("connect_db.php"); 
     
       
       if(($this->getNom()!= "" )&&($this->getPrenom() != "" )&& ($this ->getMail()!= "")&&($this ->getTelephone() != "")&&($this->Lien != "" )&&($this->LienAutre != "" )&&($this->Lieu != "" )){
	       $conn = new mysqli($servername,$username, $password,$dbname);
              
           if($conn != null){
			
			   $stmt = "INSERT INTO visites(identpers,nom,prenom,telephone,email,lien,lien_autre,lieu,valide)VALUES('".$this ->getMail()."','".$this ->getMail()."','".$this->getNom()."','".$this->getPrenom()."','".$this->getTelephone()."','".$this->Lien."','".$this->LienAutre."','".$this->Lieu."',0)";
		
			   if($conn->query($stmt)){
					$verifStmt = 1;
			   }else{
			   $verifStmt = 0;
			   }
			   
			   $req = "INSERT INTO patient(nom, prenom, lieu, adresse)VALUES('".$this ->getNom_patient()."','".$this ->getPrenom_patient()."','".$this->getLieu()."','".$this->getAdresse()."');";
			   if($conn->query($req)){
					$verifReq = 1;
			   }else{
			   $verifReq = 0;
			   }
			   
			   if($verifReq == $verifStmt){ 
				   echo '<script type="text/javascript">
				   alert("Merci de prévoir une visite, veuillez attendre la validation de l\'administrateur.");
				   </script>';} else {
				   echo "Erreur lors de l'envoi de la demande de visite.";}
			   $conn -> close();
            }   
	   }
     
}
//------------------------------------------------------------------------

 public  function ListeVisites(){
  require("connect_db.php");
  $conn = new mysqli($servername,$username, $password,$dbname);
  if($conn !=null){
          $stmt = "SELECT visites.* FROM visites WHERE visites.valide= 0";
          $liste = $conn->query($stmt);
         }  
     $conn ->close();
     return $liste;
  }
//------------------------------------------------------------------------

 public  function ValidationVisite($identifiant){
      require("connect_db.php");
      $conn = new mysqli($servername,$username, $password,$dbname);
	  if($conn !=null){
              $stmt = "UPDATE visites SET valide = 1 WHERE visites.email = '".$identifiant."'";
              $conn -> query($stmt);
         }
         $conn ->close();
 }
//------------------------------------------------------------------------
 
 public function RejetVisite($identifiant){
      require("connect_db.php");
      $conn = new mysqli($servername,$username, $password,$dbname);
	  if($conn !=null){
              $stmt = "DELETE FROM visites WHERE visites.email = '".$identifiant."'";
              $conn -> query($stmt);
         }
         $conn ->close();
 }
}
?>