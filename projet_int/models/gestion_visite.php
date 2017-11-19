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
       echo "je suis pas entrée";
       if(($this->Lien != "" )&&($this->Lieu != "" )){
				$conn = new mysqli($servername,$username, $password,$dbname);
				if($conn != null){
				
	       $stmt = "INSERT INTO publications(Nature,Lien,Description,Etat)VALUES('Visite','".$this->Lien."','".$this->Lieu."','0')";
                         echo "je suis entrée";
			if($conn->query($stmt))  echo "success";
                                 else echo "failed"; 
		}
                
		$conn -> close();
	   }
     
}
 public  function ListeVisites(){
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
 public  function ValidationVisite($identifiant){
      $conn = new mysqli($servername,$username, $password,$dbname);
	  if($conn !=null){
          $stmt = $conn->prepare("update personnes set ivalide = 1
                        WHERE Personnes.identifiant =:identifiant ");
		  $stmt->bindParam (':mail',$identifiant);
          $stmt->execute();
         }
         $conn ->close();
    }
}

?>