<?php
namespace VenueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use VenueBundle\Document\Venue;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class AdminController extends Controller{
    /**
     * @Route("/alogin")
     */
    public function adminLogAction()
    {
        $request  = $this->getRequest();
        $session = $request->getSession();
        
        if($request->attributes->has(\Symfony\Component\Security\Core\SecurityContext::AUTHENTICATION_ERROR)){
            $error = $request->attributes->get(\Symfony\Component\Security\Core\SecurityContext::AUTHENTICATION_ERROR);
        } else{
            $error = $session->get(\Symfony\Component\Security\Core\SecurityContext::AUTHENTICATION_ERROR);
        }
        
        return $this->render('VenueBundle:Admin:admin_authorization.html.twig', array(''
            . 'last_username' => $session->get(\Symfony\Component\Security\Core\SecurityContext::LAST_USERNAME),''
            . 'error' => $error));
    }
    
    /**
     * @Route("/admin", name="reg_platform")
     */
    public function adminAction(Request $request)
    {
        $venueInfo = new Venue();
        if($request->getMethod()=="POST")
        {
            $venueUser = $request->get('venueUser');
            $venuePassword = $request->get('venuePassword');
            $venueRole = $request->get('venueRole');
 
            $venueInfo->setVenueUser($venueUser);
            $venueInfo->setVenuePassword($venuePassword);
            $venueInfo->setRole($venueRole);
            $venueCreatedAt = $venueInfo->setCreatedAt(new \DateTime('now'));
            $venueUpdatedAt = $venueInfo->setUpdatedAt(new \DateTime('now'));
            
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($venueInfo);
            $dm->flush();
        }
        return $this->render('VenueBundle:Admin:registerPlatform.html.twig');
    }
}

