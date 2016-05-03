<?php
namespace VenueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Parse\ParseClient;
use Parse\ParseObject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

ParseClient::initialize('tt11', '', '8888');
ParseClient::setServerURL('http://localhost:1337/parse');


class AddController extends Controller{
    
    /**
     * @Route("/add",name="add")
     */
    public function addAction(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $venueinfo = new ParseObject("Venue");
        if($session->has('login'))
        {
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
                $main_type = $request->get('main_type');
                $additional_type = $request->get('additional_type');
                $capacity = $request->get('capacity');
                $max_capacity = $request->get('max_capacity');
                $contacts = $request->get('contacts');
                $external_resources = $request->get('external_resources');
                
                $venueinfo->set('ShortTitle',$short_title);
                $venueinfo->set('FullTitle',$full_title);
                $venueinfo->set('LocalTitle',$local_title);
                $venueinfo->set('ShortDescription',$short_desc);
                $venueinfo->set('FullDescription',$full_desc);
                $venueinfo->set('LocalDescription',$local_desc);
                $venueinfo->set('Country',$country);
                $venueinfo->set('City',$city);
                $venueinfo->set('Adress',$address);
                $venueinfo->set('Postcode',$postcode);
                $venueinfo->set('Latitude',$latitude);
                $venueinfo->set('Longtitude',$longtitude);
                $venueinfo->set('MainType',$main_type);
                $venueinfo->set('AdditionalType',$additional_type);
                $venueinfo->set('Capacity',$capacity);
                $venueinfo->set('MaxCapacity',$max_capacity);
                $venueinfo->set('Contacts',$contacts);
                $venueinfo->set('ExternalResources',$external_resources);
                $venueinfo->save();
                return $this->render('VenueBundle:Default:create.html.twig',array(''
                    . 'message'=>"Successfully added!"));
            }
        }
        else{
            return $this->render('VenueBundle:Default:denied.html.twig');
        }   return $this->render('VenueBundle:Default:create.html.twig');
    }
}