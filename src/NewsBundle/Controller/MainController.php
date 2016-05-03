<?php

namespace NewsBundle\Controller;

use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Parse\ParseClient;
use NewsBundle\Entity\News;
use NewsBundle\Entity\Accounts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

//ParseClient::setServerURL('http://localhost:1337/parse');
class MainController extends Controller {

    /**
     * @Route("/dd",name ="homkke")
     */
    public function indexAction() {
        ParseClient::initialize('tt11', '', '8888');
        ParseClient::setServerURL('http://localhost:1337/parse');
        $testObject = new ParseObject("GameScore");
        $testObject->set("foo", "the some created object");
        $testObject->save();
        $articles = $this->get('doctrine')
                ->getRepository('NewsBundle:News')
                ->findBy(array(), array('id' => 'DESC'));
        return $this->render('NewsBundle:Default:index.html.twig', array(
                    'allnews' => $articles));
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request) {
        $news = new News();
        $form = $this->createFormBuilder($news)
                ->add('Author', 'text')
                ->add('Title', 'text')
                ->add('Text', 'textarea')
                ->add('Description', 'text')
                ->add('save', SubmitType::class, array('label' => 'Add news'))
                ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid() && $form->isSubmitted()) {
                $request_add_news = $request->request->get('form');
                $news->setAuthor($request_add_news['Author']);
                $news->setTitle($request_add_news['Title']);
                $news->setText($request_add_news['Text']);
                $news->setDescription($request_add_news['Description']);
                $news->setCreated();
                $em = $this->getDoctrine()->getManager();
                $em->persist($news);
                $em->flush();
                return $this->redirectToRoute('home');
            }
        }
        return $this->render('NewsBundle:Default:create.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request) {
        $accounts = new Accounts();
        if ($request->getMethod() == 'POST') {
            $login = $request->get('login');
            $password = $request->get('password');
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('NewsBundle:Accounts');
            $user_logged_in = $repository->findOneBy(array('login' => $login,
                'password' => $password));
            if ($user_logged_in) {
                return $this->render('NewsBundle::main.html.twig', array('userName' => $user_logged_in->getName()));
            } 
            else
                return $this->render('NewsBundle::main.signin.html.twig');
        }
        return $this->render('NewsBundle::main.signin.html.twig');

    }
    
    /**
     * @Route("/pp",name="pp")
     */
    public function aaaAction(Request $request)
    {
        ParseClient::initialize('tt11', '', '8888');
        ParseClient::setServerURL('http://localhost:1337/parse');
        $paob = new ParseObject("GameScore");
        if($request->getMethod()=="POST")
        {
            $playername = $request->get('playername');
            $paob->set('playerName',$playername);
            $paob->save();
            return $this->render('NewsBundle:Default:player.html.twig');
        }
            return $this->render('NewsBundle:Default:player.html.twig');
    }

}
