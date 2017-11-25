<?php
  require ("gestion_ins.php");

class Connexion extends \Inscription{
    //put your code here
  
     //------------------------------------------------------------------------
     public function verifiIdentite(){
     require("connect_db.php");
        if(($this->getMail() != "" )&&($this->getPasswrd()!= "" )){
  				$conn = new mysqli($servername,$username, $password,$dbname);
  				if($conn != null){
  				
  	         $stmt =  "SELECT identifiant FROM personnes where identifiant='".$this->getMail()."' and passwrd='".$this->getPasswrd()."'";
                          $result = $conn ->query($stmt);
  			  if($result ->num_rows == 1){
    		    while($row = $result->fetch_assoc()) {
                $identifiant = $row["identifiant"];}
          }else $identifiant = null;
    		    $conn -> close();
    	    }
        }
        //echo $identifiant;
        return $identifiant;         
      }
  }
?>