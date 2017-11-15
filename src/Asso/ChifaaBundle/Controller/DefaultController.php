<?php

namespace Asso\ChifaaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
     /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function addPersonneAction($name)
    {
        return array('name' => $name);
    }
    /**
     * @Route("/Inscription")
     * @Template()
     */
    public function InscriptionAction(Request $request)
    {
        $p= new \Asso\ChifaaBundle\Model\Inscription();
        
         $form= $this->createFormBuilder($p)
                     ->add("Nom","text")                    
                     ->add("Prenom","text")
                     ->add("Mail","text")
                     ->add("Telephone","text")
                     ->add("Partage","text")
                     ->add("Passwrd","text")
                     ->add("Ajouter","submit")
                     ->getForm();
            $form ->handleRequest($request);    
            
             if($form->isValid()){
                
            }
        return array('f'=>$form->createView());
        
    }
   /**
     * @Route("/Contact",name="Contact")
     * @Template()
     */
    public function ContactAction()
    {
        return array();
    }
   
}
