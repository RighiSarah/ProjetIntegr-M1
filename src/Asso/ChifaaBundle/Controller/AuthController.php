<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Asso\ChifaaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of AuthController
 *
 * @author pci
 */
class AuthController extends Controller{
    //put your code here
     /**
     * @Route("/Auth/Connexion")
     * @Template()
     */
    public function ConnexionAction(Request $request)
        
    {
        $p= new \Asso\ChifaaBundle\Model\Authentification();
        
         $form= $this->createFormBuilder($p)
                     ->add("Mail","text")                    
                     ->add("Passwrd","text")
                     ->add("Ajouter","submit")
                     ->getForm();   
         $form->handleRequest($request);
         
          if($form->isValid()){
               $b = $p->VerifIdentite();
               if($b){
                   
               }else{
                   
               }
            }
        return array('f'=>$form->createView());
    } 
}
