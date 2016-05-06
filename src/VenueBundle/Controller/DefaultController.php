<?php

namespace VenueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VenueBundle\Document\Venue;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {

    /**
     * @Route("/",name="home")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction() {
        $venueinfo = new Venue();
        return $this->render('VenueBundle:Default:venue.html.twig',array(''
            . 'venueinfo' => $venueinfo->getFullTitle()));
    }
    
    /**
     * @Route(name="add")
     * @Security("has_role('ROLE_USER')")
     */
    public function addAction(Request $request)
    {
        $venueinfo = new Venue();
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
                
                $venueinfo->setCreatedAt(new \DateTime('now'));
                $venueinfo->setUpdatedAt(new \DateTime('now'));
                $venueinfo->setShortTitle($short_title);
                $venueinfo->setFullTitle($full_title);
                $venueinfo->setLocalTitle($local_title);
                $venueinfo->setShortDesc($short_desc);
                $venueinfo->setFullDesc($full_desc);
                $venueinfo->setLocalDesc($local_desc);
                $venueinfo->setCountry($country);
                $venueinfo->setCity($city);
                $venueinfo->setAdress($address);
                $venueinfo->setPostcode($postcode);
                $venueinfo->setLatitude($latitude);
                $venueinfo->setLongtitude($longtitude);
                $venueinfo->setMainType($main_type);
                $venueinfo->setAdditionalType($additional_type);
                $venueinfo->setCapacity($capacity);
                $venueinfo->setMaxCapacity($max_capacity);
                $venueinfo->setContacts($contacts);
                $venueinfo->setExternalResources($external_resources);
                $dm = $this->get('doctrine_mongodb')->getManager();
                $dm->persist($venueinfo);
                $dm->flush();
            }
          return $this->render('VenueBundle:Default:venue.html.twig');
    }

}
