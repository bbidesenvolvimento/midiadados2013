<?php

namespace Bbi\TmanagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BbiTmanagerBundle:Default:index.html.twig', array('name' => $name));
    }
}
