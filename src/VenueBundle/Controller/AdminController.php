<?php
namespace VenueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use VenueBundle\Document\Platforms;
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
        $venueInfo = new Platforms();
        if($request->getMethod()=="POST")
        {
            $venueUser = $request->get('venueUser');
            $venuePassword = $request->get('venuePassword');
            $venueRole = $request->get('venueRole');
                 $short_title = $request->get('short_title');
                $full_title = $request->get('full_title');
                $local_title = $request->get('local_title');
                $short_desc = $request->get('short_desc');
                $full_desc = $request->get('full_desc');
                $local_desc = $request->get('local_desc');
                $country = $request->get('country');
                $city = $request->get('city');
                $address = $request->get('adress');
                $postcode = $request->get('postcode');
                $latitude = $request->get('latitude');
                $longtitude = $request->get('longtitude');
                $main_type = $request->get('maintype');
                $additional_type = $request->get('additional_type');
                $capacity = $request->get('capacity');
                $max_capacity = $request->get('max_capacity');
                $contacts = $request->get('contacts');
                $external_resources = $request->get('external_resources');
                
                $venueInfo->setShortTitle($short_title);
                $venueInfo->setFullTitle($full_title);
                $venueInfo->setLocalTitle($local_title);
                $venueInfo->setShortDesc($short_desc);
                $venueInfo->setFullDesc($full_desc);
                $venueInfo->setLocalDesc($local_desc);
                $venueInfo->setCountry($country);
                $venueInfo->setCity($city);
                $venueInfo->setAdress($address);
                $venueInfo->setPostcode($postcode);
                $venueInfo->setLatitude($latitude);
                $venueInfo->setLongtitude($longtitude);
                $venueInfo->setMainType($main_type);
                $venueInfo->setAdditionalType($additional_type);
                $venueInfo->setCapacity($capacity);
                $venueInfo->setMaxCapacity($max_capacity);
                $venueInfo->setContacts($contacts);
                $venueInfo->setExternalResources($external_resources);
 
            $venueInfo->setUsername($venueUser);
            $venueInfo->setPassword($venuePassword);
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

