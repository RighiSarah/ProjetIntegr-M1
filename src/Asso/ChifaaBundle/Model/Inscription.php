<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Asso\ChifaaBundle\Model;
/**
 * Description of Inscription
 *
 * @author pci
 */
class Inscription {
    //put your code here
     private $Nom;
     Private $Prenom;
     Private $Telephone;
     Private $Passwrd;
     Private $Partage;
     Private $Mail;
     
     //---------------------Set et Get Nom-------------------------------------
     public function getNom(){
         return $this -> Nom;
     }
     public function setNom($nom){
         $this ->Nom = $nom;
         return $this;
     }
     //--------------------------------------------------------------------------
     public function getPrenom(){
         return $this -> Prenom;
     }
     public function setPrenom($prenom){
         $this ->Prenom = $prenom;
         return $this;
     }
     //-------------------------------------------------------------------------
     public function getTelephone(){
         return $this -> Telephone;
     }
     public function setTelephone($telephone){
         $this ->Telephone = $telephone;
         return $this;
     } 
     //-------------------------------------------------------------------------
     public function getPasswrd(){
         return $this -> Passwrd;
     }
     public function setPasswrd($passwrd){
         $this ->Passwrd = $passwrd;
         return $this;
     } 
     //-------------------------------------------------------------------------
     public function getPartage(){
         return $this -> Partage;
     }
     public function setPartage($passwrd){
         $this ->Partage = $passwrd;
         return $this;
     }
     //-------------------------------------------------------------------------
     public function getMail(){
         return $this -> Mail;
     }
     public function setMail($mail){
         $this ->Mail = $mail;
         return $this;
     }
     
}
