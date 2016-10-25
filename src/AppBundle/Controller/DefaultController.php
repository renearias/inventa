<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/app2/example", name="homepage2")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
    
     /**
     * @Route("/", name="homepage")
     * @Method("GET")
     * @Cache(expires="+1 minute") 
     **/
    public function homePageAction()
    {
        return $this->render('basesmartpanel.html.twig');
    }
    
    /**
     * 
     * @Route("/inicio", name="inicio")
     * @Method("GET")
     * @Cache(expires="+1 minute") 
     **/
    public function inicioAction()
    {
        return $this->render('AppBundle:app:inicio.html.twig');
    }
    
    
    
}
