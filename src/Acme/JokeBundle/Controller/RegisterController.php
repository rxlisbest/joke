<?php

namespace Acme\JokeBundle\Controller;

use Acme\JokeBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class RegisterController extends Controller
{
    public function __construct(){
	$this->session = new Session();
	$this->session->start();
    }
    public function indexAction()
    {
        return $this->render('AcmeJokeBundle:Default:register.html.twig');
    }

    public function saveAction(Request $request)
    {
	$this->session->getFlashBag()->setAll(array(
		'username'=>$request->request->get("username"),
		'password'=>$request->request->get("password"),
		'confirmpassword'=>$request->request->get("confirmpassword"),
		'email'=>$request->request->get("email"),
	));
	$valid = array(
		'username'=>"昵称",
		'email'=>"邮箱",
		'password'=>"密码",
		'confirmpassword'=>"确认密码",
	);
	foreach($valid as $key => $value){
		if(!$request->request->get($key)){
			$this->session->getFlashBag()->set('notice', $value."不能为空!");
			return $this->redirect($this->get('router')->generate('joke_register'));
		}
	}
	if($request->request->get("password")!=$request->request->get("confirmpassword")){
		$this->session->getFlashBag()->set('notice', "两次输入密码不相同!");
		return $this->redirect($this->get('router')->generate('joke_register'));
	}
	$repository = $this->getDoctrine()->getRepository("AcmeJokeBundle:Users");
	$user = $repository->findOneBy(array('username'=>$request->request->get("username")));
	if($user){
		$this->session->getFlashBag()->set('notice', "昵称己经存在!");
		return $this->redirect($this->get('router')->generate('joke_register'));
	}
	$user = $repository->findOneBy(array('email'=>$request->request->get("email")));
	if($user){
		$this->session->getFlashBag()->set('notice', "邮箱己经注册!");
		return $this->redirect($this->get('router')->generate('joke_register'));
	}
	$user = new Users();
	$user->setUsername($request->request->get("username"));
	$user->setEmail($request->request->get("email"));
	$user->setPassword(md5($request->request->get("password")));
	$user->setCreatetime(new \DateTime());
	$em = $this->getDoctrine()->getManager();
    	$em->persist($user);
    	$em->flush();
	if($user->getId()){
		return $this->redirect($this->get('router')->generate('joke_login'));
	}
	else{
		$this->session->getFlashBag()->set('notice', array("error"=>"注册失败!"));
		return $this->redirect($this->get('router')->generate('joke_register'));
	}
    }
}
