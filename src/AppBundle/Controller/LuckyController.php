<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{count}")
     */
   public function numberAction($count)
	{
	   $numbers = array(0,100);
       for ($i = 0; $i < $count; $i++)
	   {
       	  $numbers[$i] = rand(0, 100);
       }
        $numbersList = implode(', ', $numbers);
    	return $this->render(
        	'lucky/number.html.twig',
        	array('luckyNumberList' => $numbersList,'count'=>$count)
    	);
	}

    // ...
}
?>