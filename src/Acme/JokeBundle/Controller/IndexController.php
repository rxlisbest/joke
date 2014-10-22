<?php

namespace Acme\JokeBundle\Controller;

use Acme\JokeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeJokeBundle:Default:list.html.twig');
    }

    public function checkAction(Request $request)
    {
	$repository = $this->getDoctrine()->getRepository("AcmeJokeBundle:Users");
	$user = $repository->findOneBy(array('username'=>$request->request->get("username"), 'password'=>$request->request->get("password")));
	$session = new Session();
	$session->start();
	if($user){
		$session->getFlashBag()->add('notice', "登陆成功!");
		return $this->redirect($this->get('router')->generate('joke_login'));
	}
	else{
		$session->getFlashBag()->add('notice', "用户名或密码错误!");
		return $this->redirect($this->get('router')->generate('joke_login'));
	}
    }
}
