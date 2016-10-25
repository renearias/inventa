<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Facturasp;
use Multiservices\InventarioBundle\Form\FacturaspType;

/**
 * Facturasp controller.
 *
 * @Route("/facturasp")
 */
class FacturaspController extends Controller
{

    /**
     * Lists all Facturasp entities.
     *
     * @Route("/", name="facturasp")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Facturasp')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Facturasp entity.
     *
     * @Route("/", name="facturasp_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Facturasp:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Facturasp();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $articulos=$entity->getCompraArticulos();
               $totalperarticulo=0;      
               foreach ($articulos as $compraarticulo) {
                   $cantidad=$compraarticulo->getCantidad();
                   $articulo=$compraarticulo->getCodigo();
                   $stock=$articulo->getStock();
                   $articulo->setStock($stock+$cantidad);
                   $totalperarticulo+=$compraarticulo->getCantidad()*$compraarticulo->getPrecio();
                }     
                
              $entity->setTotalfactura($totalperarticulo*1.12);
             $entity->setBorrado(0);
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('facturasp_show', array('id' => $entity->getId())));
        }else
        {
            echo "algo no funka";
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Facturasp entity.
     *
     * @param Facturasp $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Facturasp $entity)
    {
        $form = $this->createForm(new FacturaspType(), $entity, array(
            'action' => $this->generateUrl('facturasp_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Facturasp entity.
     *
     * @Route("/new", name="facturasp_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Facturasp();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Finds and displays a Facturasp entity.
     *
     * @Route("/{id}/print", name="facturasp_print")
     * @Method("GET")
     * @Template()
     */
    public function printAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Facturasp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facturasp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Finds and displays a Facturasp entity.
     *
     * @Route("/{id}", name="facturasp_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Facturasp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facturasp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Facturasp entity.
     *
     * @Route("/{id}/edit", name="facturasp_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Facturasp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facturasp entity.');
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
    * Creates a form to edit a Facturasp entity.
    *
    * @param Facturasp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Facturasp $entity)
    {
        $form = $this->createForm(new FacturaspType(), $entity, array(
            'action' => $this->generateUrl('facturasp_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Facturasp entity.
     *
     * @Route("/{id}", name="facturasp_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Facturasp:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Facturasp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facturasp entity.');
        }
        
        $previousCollections = array(
        'articulos' => $entity->getCompraArticulos()
         );   
        
        $articulosant=$entity->getCompraArticulos();
        $cantidadanterior=[];
        foreach ($articulosant as $key=>$articulo) {
            $cantidadanterior[$key]=$articulo->getCantidad();
        }
               
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            
                
               $articulos=$entity->getCompraArticulos();
               $totalperarticulo=0;      
               foreach ($articulos as $key=>$compraarticulo) {
                   $cantidad=$compraarticulo->getCantidad();
                   $articulo=$compraarticulo->getCodigo();
                   $stock=$articulo->getStock();
                   if (isset($cantidadanterior[$key]))
                   {
                    $diferencia=$cantidad-$cantidadanterior[$key];
                   }else
                   {
                     $diferencia=$cantidad;  
                   }
                   $articulo->setStock($stock+$diferencia);
                   $totalperarticulo+=$compraarticulo->getCantidad()*$compraarticulo->getPrecio();
                }     
                
              $entity->setTotalfactura($totalperarticulo*1.12);
             
            
            
            $em->flush();

            return $this->redirect($this->generateUrl('facturasp_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Deletes a Facturasp entity.
     *
     * @Route("/{id}", name="facturasp_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Facturasp')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Facturasp entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('facturasp'));
    }

    /**
     * Creates a form to delete a Facturasp entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('facturasp_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
