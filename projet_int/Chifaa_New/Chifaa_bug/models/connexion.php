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
  				
            $stmt =  "SELECT identifiant FROM personnes WHERE identifiant='".$this->getMail()."' and passwrd='".$this->getPasswrd()."'";
                          $result = $conn ->query($stmt);
  	        $stmt1 =  "SELECT identifiant FROM personnes WHERE identifiant='".$this->getMail()."' and passwrd='".$this->getPasswrd()."' and valide = 1";
                          $result1 = $conn ->query($stmt1);
            $stmt2 =  "SELECT identifiant FROM personnes WHERE identifiant='".$this->getMail()."' and passwrd='".$this->getPasswrd()."' and valide = 0";
                          $result2 = $conn ->query($stmt2);

  			  if($result1 ->num_rows == 1 and $result2 ->num_rows == 0 and $result ->num_rows == 1 ){
    		    while($row = $result->fetch_assoc()) {
                $identifiant = $row["identifiant"];}
          }else if ($result2 ->num_rows == 1 and $result1 ->num_rows == 0 and $result ->num_rows == 1){
            echo '<script type="text/javascript">
        		  alert("Votre demande d\'inscription n\'a pas encore été validée par l\'administrateur.");
      			  </script>';
          }else if ($result2 ->num_rows == 0 and $result1 ->num_rows == 0 and $result ->num_rows == 0){
           $identifiant = null;
    		    $conn -> close();
    	    }
        }
        return $identifiant;         
      }
  }
}
?>