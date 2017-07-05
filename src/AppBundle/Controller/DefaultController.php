<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;


class DefaultController extends Controller
{
    /**
     * @Route("/downloadlog", name="downloadlog")
     */
    public function indexAction()
    {
        $file=$this->get('kernel')->getLogDir().'/'.$this->get('kernel')->getEnvironment().'.log';
        $response = new BinaryFileResponse($file);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT);
        return $response;
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
