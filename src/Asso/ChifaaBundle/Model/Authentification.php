<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Asso\ChifaaBundle\Model;
/**
 * Description of Authentification
 *
 * @author pci
 */
class Authentification {
    //put your code here
    private $Mail;
    private $Passwrd;
    //------------------------------------------------------------------------
     public function getMail(){
         return $this -> Mail;
     }
     public function setMail($mail){
         $this ->Mail= $mail;
         return $this;
     }
     //------------------------------------------------------------------------
     public function getPasswrd(){
         return $this -> Mail;
     }
     public function setPasswrd($mail){
         $this ->Mail= $mail;
         return $this;
     }
     //------------------------------------------------------------------------
     public  function VerifIdentite(){
        
         return true;
     }
}
