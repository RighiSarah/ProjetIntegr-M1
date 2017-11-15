<?php

namespace Jbnet\Bootstrap\ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JbnetBootstrapThemeBundle:Default:index.html.twig', array('name' => $name));
    }
}
