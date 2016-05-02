<?php

namespace VenueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Parse\ParseQuery;
use Parse\ParseClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use VenueBundle\Modals\Login;

ParseClient::initialize('tt11', '', '8888');
ParseClient::setServerURL('http://localhost:1337/parse');

class DefaultController extends Controller {
    
    /**
     * @Route("/",name="home")
     */
    public function indexAction()
    {
        $session = $this->getRequest()->getSession();
        if($session->has('login')){
                $login = $session->get('login');
                $username = $login->getUsername();
                $password = $login->getPassword(); 
                $query = new ParseQuery('Accounts');
                $successfull_login = $query->equalTo('login', $username);
                $successfull_password = $query->equalTo('password', $password);
                $r_login = $successfull_login->find();
                $r_pass = $successfull_password->find();
                if($r_login && $r_pass){
                    return $this->render('VenueBundle:Default:venue.html.twig',
                        array('user'=>$r_login, 'session_id'=>$session->getId()));
                }
            }
        return $this->render('VenueBundle:Default:venue.html.twig');
    }
    
    /**
     * @Route("/log",name="log")
     */
    public function loginAction(Request $request) {
        $session = $this->getRequest()->getSession();
        if($request->getMethod()=="POST"){
            $session->clear();
            $username = $request->get('username');$password = $request->get('password');
            $query = new ParseQuery('Accounts');
            $successfull_login = $query->equalTo('login', $username);
            $successfull_password = $query->equalTo('password', $password);
            $r_login = $successfull_login->find(); $r_pass = $successfull_password->find();
            if($r_login && $r_pass){
                $login = new Login();
                $login->setUsername($username); $login->setPassword($password);
                $session->set('login',$login);
                return $this->redirectToRoute("home");
            } else {
                return $this->render('VenueBundle:Default:signin.html.twig',
                        array('error'=>'Incorrect data!'));
            }
        }
        else {
            if($session->has('login')){
                return $this->redirectToRoute("home");
            }
        }
        return $this->render('VenueBundle:Default:signin.html.twig');
    }
    
    /**
     * @Route("/logout",name="logout")
     */
    public function logoutAction()
    {
        $session = $this->getRequest()->getSession();
        $session->clear();
        return $this->render('VenueBundle:Default:signin.html.twig');
    }
    
}
