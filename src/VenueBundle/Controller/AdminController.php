<?php
namespace VenueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Parse\ParseQuery;
use Parse\ParseClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

ParseClient::initialize('tt11', '', '8888');
ParseClient::setServerURL('http://localhost:1337/parse');

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
     * @Route("/admin")
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page</body></html>');
    }
}

