<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HiController extends Controller
{
	/**
     * @Route("/hi/")
     */
	public function helloWorld()
	{
		return $this->render(
					'hi/hipage.html.twig'
			);
	}
}

?>