<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Asso\ChifaaBundle\Controller;
namespace Asso\ChifaaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of Visite
 *
 * @author pci
 */
class VisiteController extends Controller{
    //put your code here
     /**
     * @Route("/Visite/PrevoirVisite")
     * @Template()
     */
    
     public function PrevoirVisiteAction(Request $request)
        
    {
        $p= new \Asso\ChifaaBundle\Model\Visites();
       
         $form= $this->createFormBuilder($p)
                     ->add("Nom","text")                    
                     ->add("Prenom","text")
                     ->add("Mail","text")                   
                     ->add("Lieu","text")
                     ->add("Lien","text")
                     ->add("Ajouter","submit")
                     ->getForm();
            $form ->handleRequest($request);  
            
            if($form->isValid()){
                
            }
        return array('f'=>$form->createView());
    } 
    
}
