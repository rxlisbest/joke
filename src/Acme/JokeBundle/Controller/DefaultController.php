<?php

namespace Acme\JokeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JokeBundle:Default:login.html.twig', array('name' => $name));
    }
}
