<?php
	require ("gestion_ins.php");
	
	class Contact extends \Inscription{
	Private $Date; 
	Private $Sujet;
	Private $Message;
	
	//----------------------------------------------------------
     public function getDat(){
         return $this -> Dat;
     }
     public function setDat($date){
         $this ->Dat = $date;
     }
    //----------------------------------------------------------
     public function getSujet(){
         return $this -> Sujet;
     }
     public function setSujet($sujet){
         $this ->Sujet = $sujet;
     }
    //----------------------------------------------------------
     public function getMsg(){
         return $this -> Message;
     }
     public function setMsg($message){
         $this ->Message = $message; 
     } 
    //----------------------------------------------------------
     public function EnvoieMessage(){
     
     	require ("connect_db.php");
     	
     	if(($this->getNom() != "" ) && ($this->getPrenom() != "" ) && ($this->getMail()!= "" ) 
     	&& ($this-> Sujet != "" ) && ($this->Message != "" ) ){
    
     		$conn = new mysqli($servername, $username, $password, $dbname);
     		
     		if ($conn != null){
     			
     			$sql = "INSERT INTO message (identifiant,nom,prenom,mail,date,sujet,mess)VALUES(DEFAULT,'".$this ->getNom()."','".$this -> getPrenom()."','".$this -> getMail()."','".$this -> Dat."','".$this->Sujet."','".$this ->Message."');";
				
				if($conn->query($sql)){
					echo '<script type="text/javascript"> 
					alert("Message envoyé! Notre administrateur vous répondra dans les meilleurs délais.");
					</script>';
					
				}else{
					echo '<script type="text/javascript"> alert("Erreur lors de l\'envoie du message ! ") ;</script>';
				}
				$conn->close();	
			}
			
		}else{
		
			echo '<script type="text/javascript"> 
			alert("Tous les champs sont requis !");</script>';
		}
		
	}
}
?>