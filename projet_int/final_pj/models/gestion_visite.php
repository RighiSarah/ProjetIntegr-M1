<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Visites
 *
 * @author pci
 */
require ("gestion_ins.php");
class Visites extends \Inscription{
    //put your code here
    Private $Lieu;
    Private $Lien;
    //------------------------------------------------------------------------
     public function getLieu(){
         return $this -> Lieu;
     }
     public function setLieu($lieu){
         $this ->Lieu= $lieu;
         return $this;
     }
     //------------------------------------------------------------------------
     public function getLien(){
         return $this -> Lien;
     }
     public function setLien($lien){
         $this ->Lien= $lien;
         return $this;
     }
     //------------------------------------------------------------------------
     public function Prevoire_visite(){
     require("connect_db.php"); 
     
       
       if(($this->Lien != "" )&&($this->Lieu != "" )&&($this->getNom()!= "" )&&($this->getPrenom() != "" )&& ($this ->getMail()!= "")){
	       $conn = new mysqli($servername,$username, $password,$dbname);
              
               if($conn != null){
			
	       $stmt = "INSERT INTO visites(email,identpers,lien,lieu,nom,prenom,valide)VALUES('".$this ->getMail()."','".$this ->getMail()."','".$this->Lien."','".$this->Lieu."','".$this->getNom()."','".$this->getPrenom()."',0)";
			 //$conn->query($stmt);
         if($conn->query($stmt))  echo '<script type="text/javascript">
        alert("Merci de nous prévoir une visite, veuillez attendre la validation de l\'administrateur.");
      </script>';
                                 else echo "failed"; 
          $conn -> close();
                        }   
              

		
	   }
     
}
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
 public  function ValidationVisite($identifiant){
      require("connect_db.php");
      $conn = new mysqli($servername,$username, $password,$dbname);
	  if($conn !=null){
              $stmt = "update visites set valide = 1 WHERE visites.email = '".$identifiant."'";
              $conn -> query($stmt);
         }
         $conn ->close();
 }
}
?>