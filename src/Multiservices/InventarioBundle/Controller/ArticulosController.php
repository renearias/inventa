<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Articulos;
use Multiservices\InventarioBundle\Form\ArticulosType;

/**
 * Articulos controller.
 *
 * @Route("/articulos")
 */
class ArticulosController extends Controller
{

    /**
     * Lists all Articulos entities.
     *
     * @Route("/", name="articulos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Articulos')->findAll();
         foreach ($entities as $articulo)
                {
                   $equiposmac = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalle')->findByCodarticulo($articulo->getId());
            if (!$equiposmac)
            {
                $articulo->registrados=0;
                $articulo->libres=0;
                $articulo->ocupados=0;
                $articulo->danados=0;
            }else
                {
                $articulo->libres=0;
                 $articulo->ocupados=0;
                 $articulo->danados=0; 
                $articulo->registrados=count($equiposmac);
                 foreach($equiposmac as $equipo)
                 {
                     if ($equipo->getEstatus()=="LIBRE")
                     {
                         $articulo->libres++;
                     }
                     if ($equipo->getEstatus()=="OCUPADO")
                     {
                         $articulo->ocupados++;
                     }
                     if ($equipo->getAntiguedad()=="DAÑADO")
                     {
                         $articulo->danados++;
                     }
                 }
                 
                }
              }
        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Articulos entity.
     *
     * @Route("/", name="articulos_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Articulos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Articulos();
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setBorrado(0);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articulos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Articulos entity.
     *
     * @param Articulos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Articulos $entity)
    {
        $form = $this->createForm(new ArticulosType(), $entity, array(
            'action' => $this->generateUrl('articulos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Articulos entity.
     *
     * @Route("/new", name="articulos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Articulos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Articulos entity.
     *
     * @Route("/{id}", name="articulos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Articulos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articulos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Finds and displays a Articulos entity.
     *
     * @Route("/{id}/ajaxgrid", name="articulos_showajaxgrid")
     * @Method("GET")
     * 
     */
    public function ajaxgridAction($id)
    {
       $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Articulos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articulos entity.');
        }

        $html = $this->renderView('MultiservicesInventarioBundle:Articulos:ajaxgrid.json.twig', array('entity'=> $entity));
        
        $response = new Response($html,Response::HTTP_OK,array('Content-Type'=>'application/json'));
        
        return $response;
    }
    

    /**
     * Displays a form to edit an existing Articulos entity.
     *
     * @Route("/{id}/edit", name="articulos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Articulos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articulos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Articulos entity.
    *
    * @param Articulos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Articulos $entity)
    {
        $form = $this->createForm(new ArticulosType(), $entity, array(
            'action' => $this->generateUrl('articulos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Articulos entity.
     *
     * @Route("/{id}", name="articulos_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Articulos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Articulos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articulos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('articulos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Articulos entity.
     *
     * @Route("/{id}", name="articulos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Articulos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Articulos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('articulos'));
    }

    /**
     * Creates a form to delete a Articulos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articulos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
}
