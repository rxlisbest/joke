<?php

namespace Acme\JokeBundle\Controller;

use Acme\JokeBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeJokeBundle:Default:register.html.twig');
    }

    public function saveAction(Request $request)
    {
	$user = new Users();
	$user->setUsername($request->request->get("username"));
	$user->setEmail($request->request->get("email"));
	$user->setPassword($request->request->get("password"));
	$user->setCreatetime(new \DateTime());
	$em = $this->getDoctrine()->getManager();
    	$em->persist($user);
    	$em->flush();
	var_dump(111);exit;
	if($user->get_Id()){
		return $this->redirect($this->get('router')->generate('joke_login'));
	}
	else{
		return $this->redirect($this->get('router')->generate('joke_register'));
	}
    }
}
