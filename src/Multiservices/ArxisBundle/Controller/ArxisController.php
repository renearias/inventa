<?php

namespace Multiservices\ArxisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Multiservices\ArxisBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class ArxisController extends Controller
{
    
    /**
     * @Route("/", name="_arxis")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        
        return $this->render('MultiservicesArxisBundle:Arxis:index.html.twig');
        
        
    }
    /**
     * @Route("/inicio", name="inicio")
     * @Template()
     */
    public function inicioAction(Request $request)
    {
        return null;
    }
    
    /**
     * @Route("/clearcache", name="clear_cache")
     * 
     */
    public function clearcacheAction(Request $request)
    {
        
        $cont =shell_exec("php ../app/console cache:clear"); 
        
        

        
        //echo $cont;
        return new Response("$cont");
    }
    
    /**
     * @Route("/hello/{name}", name="_arxis_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/hello/admin/{name}", name="_arxis_admin_hello")
     * @Security("is_granted('ROLE_ADMIN')")
     * @Template()
     */
    public function helloadminAction($name)
    {
        return array('name' => $name);
    }
    
    /**
     * @Route("/contact", name="_arxis_contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $mailer = $this->get('mailer');

            // .. setup a message and send it
            // http://symfony.com/doc/current/cookbook/email.html

            $request->getSession()->getFlashBag()->set('notice', 'Message sent!');

            return new RedirectResponse($this->generateUrl('_arxis'));
        }

        return array('form' => $form->createView());
    }
}
