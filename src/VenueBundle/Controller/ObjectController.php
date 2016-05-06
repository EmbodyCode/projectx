<?php
namespace VenueBundle\Controller;

use VenueBundle\Document\Venue;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ObjectController extends Controller{
    /**
     * @Route("/test")
    */ 
    public function indexAction()
    {
        $venue = new Venue();
        $venue->setId(new \MongoId());
        $venue->setShortTitle('Lodld');
        $venue->setUpdatedAt(new \DateTime('now'));
        $venue->setCreatedAt(new \DateTime('now'));
        $venue->setVenueUser('Andrefasdsay');
        $venue->setVenuePassword(('qqвылвлвww'));
        
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($venue);
        $dm->flush();
        return $this->render('VenueBundle:Default:denied.html.twig',array(''
            . 'venueinfo' => $venue->getVenueuser()));
   
    
    }
}

