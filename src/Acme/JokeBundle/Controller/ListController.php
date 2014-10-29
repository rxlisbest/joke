<?php

namespace Acme\JokeBundle\Controller;

use Acme\JokeBundle\Entity\JokesList;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class ListController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeJokeBundle:Default:list.html.twig');
    }

    public function ListAction($page=1)
    {
	$perpage = 2;
	$offset = ($page-1)*$perpage;
	$conn = $this->get('database_connection');
        $JokesNum = $conn->fetchColumn('SELECT count(*) FROM JokesList');
        $Jokes = $conn->fetchAll('SELECT * FROM JokesList ORDER BY id DESC LIMIT '.$perpage.' OFFSET '.$offset);
        return $this->render('AcmeJokeBundle:Default:list.html.twig', array("Jokes"=>$Jokes,"JokesNum"=>$JokesNum,"page"=>$page,"perpage"=>$perpage)); 
    }
	
	public function PageAction($num=0, $perpage=10, $curpage=1){
		$pages = ceil($num/$perpage);
        	return $this->render('AcmeJokeBundle:Default:page.html.twig', array("pages"=>$pages,"curpage"=>$curpage)); 
	}
}
