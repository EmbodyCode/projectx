<?php

namespace VenueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {

    /**
     * @Route("/",name="home")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction() {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            throw $this->createAccessDeniedException();
        }

        $user = $this->getUser();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        return $this->render('VenueBundle:Default:venue.html.twig',array(''
            . 'ShortTitle' => $user->getShortTitle(),''
            . 'LocalTitle' => $user->getLocalTitle(),''
            . 'FullTitle' => $user->getFullTitle(),''
            . 'ShortDesc' => $user->getShortDesc(),''
            . 'FullDesc' => $user->getFullDesc(),''
            . 'LocalDesc' => $user->getLocalDesc(),''
            . 'Country' => $user->getCountry(),''
            . 'City' => $user->getCity(),''
            . 'Adress' => $user->getAdress(),''
            . 'MainType' =>$user->getMainType(),''
            . 'AdditionalType' => $user->getAdditionalType(),''
            . 'ExternalResources' => $user->getExternalResources(),''
            . 'PostCode' => $user->getPostcode(),''
            . 'Capacity' => $user->getCapacity(),''
            . 'MaxCapacity' => $user->getMaxCapacity(),''
            . 'Latitude' => $user->getLatitude(),''
            . 'Longtitude' => $user->getLongtitude(),''
            . 'Contacts' => $user->getContacts()));
    }
    
    /**
     * @Route("/update", name="updateInfo")
     * @Security("has_role('ROLE_USER')")
     */
    public function addAction(Request $request)
    {
        $user = $this->getUser();
        $user = $this->get('security.token_storage')->getToken()->getUser();
            if($request->getMethod()=="POST")
            {
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
                
  
                $user->setShortTitle($short_title);
                $user->setFullTitle($full_title);
                $user->setLocalTitle($local_title);
                $user->setShortDesc($short_desc);
                $user->setFullDesc($full_desc);
                $user->setLocalDesc($local_desc);
                $user->setCountry($country);
                $user->setCity($city);
                $user->setAdress($address);
                $user->setPostcode($postcode);
                $user->setLatitude($latitude);
                $user->setLongtitude($longtitude);
                $user->setMainType($main_type);
                $user->setAdditionalType($additional_type);
                $user->setCapacity($capacity);
                $user->setMaxCapacity($max_capacity);
                $user->setContacts($contacts);
                $user->setExternalResources($external_resources);
                $dm = $this->get('doctrine_mongodb')->getManager();
                $dm->persist($user);
                $dm->flush();
            }
          return $this->redirectToRoute('home');
    }

}
