<?php

namespace VenueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

ParseClient::initialize('tt11', '', '8888');
ParseClient::setServerURL('http://localhost:1337/parse');

class DefaultController extends Controller {

    /**
     * @Route("/",name="addform")
     */
    public function indexAction(Request $request) {
        if ($request->getMethod() == "POST") {
            $object = $request->get('objectname');
            $objectprice = $request->get('objectprice');
            $objectadd = ParseObject::create("Store");
            $objectadd->set("electro", $object);
            $objectadd->set("price", $objectprice);
            $objectadd->save();
            return $this->render('VenueBundle:Default:index.html.twig', array('object' => $object));
        }
        return $this->render('VenueBundle:Default:index.html.twig');
    }

    /**
     * @Route("/objects",name="listobjects")
     */
    public function showAction() {
        $query = new ParseQuery("Store");
        $results = $query->find();
        return $this->render('VenueBundle:Default:objects.html.twig', array('listobjects' => $results));
    }

    /**
     * @Route("/log",name="log")
     */
    public function loginAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $login = $request->get('login');
            $password = $request->get('password');
            $query = new ParseQuery('Accounts');
            $query_successful_login = $query->equalTo("login", $login);
            $query_successful_password = $query->equalTo("password", $password);
            
            $right_login = $query_successful_login->find();
            $right_password = $query_successful_password->find();
            if ($right_login && $right_password) {
                return $this->render('VenueBundle:Default:venue.html.twig', array(''
                            . 'user' => $right_login));
            } else {
                return $this->render('VenueBundle:Default:error.html.twig', array(''
                            . 'error' => 'Unsuccessfully login!'));
            }
        }
        return $this->render('VenueBundle:Default:signin.html.twig');
    }

}
