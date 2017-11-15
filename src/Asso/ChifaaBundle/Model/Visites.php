<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Asso\ChifaaBundle\Model;
/**
 * Description of Visites
 *
 * @author pci
 */
class Visites extends \Asso\ChifaaBundle\Model\Inscription{
    //put your code here
    Private $Lieu;
    Private $Lien;
    //------------------------------------------------------------------------
     public function getLieu(){
         return $this -> Lieu;
     }
     public function setLieu($lieu){
         $this ->Mail= $lieu;
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
     
}