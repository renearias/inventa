<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Pedidos;
use Multiservices\InventarioBundle\Form\PedidosType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Pedidos controller.
 *
 * @Route("/pedidos")
 */
class PedidosController extends Controller
{

    /**
     * Lists all Pedidos entities.
     *
     * @Route("/", name="pedidos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Pedidos')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Pedidos entity.
     *
     * @Route("/", name="pedidos_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Pedidos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Pedidos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
 
        if ($form->isValid()) {
                       
             $articulos=$entity->getPedidoArticulos();
                     
               foreach ($articulos as $pedidoarticulo) {
                   $cantidad=$pedidoarticulo->getCantidad();
                   $articulo=$pedidoarticulo->getCodigo();
                   $stock=$articulo->getStock();
                   $articulo->setStock($stock-$cantidad);
                }     
              $entity->setTotalpedido(0);
             $entity->setBorrado(0);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
     
            
            return $this->redirect($this->generateUrl('pedidos_show', array('id' => $entity->getId())));
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
     * Creates a form to create a Pedidos entity.
     *
     * @param Pedidos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pedidos $entity)
    {
        $form = $this->createForm(PedidosType::class, $entity, array(
            'action' => $this->generateUrl('pedidos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pedidos entity.
     *
     * @Route("/new", name="pedidos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Pedidos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Pedidos entity.
     *
     * @Route("/{id}", name="pedidos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedidos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pedidos entity.
     *
     * @Route("/{id}/edit", name="pedidos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedidos entity.');
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
    * Creates a form to edit a Pedidos entity.
    *
    * @param Pedidos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pedidos $entity)
    {
        $form = $this->createForm(PedidosType::class, $entity, array(
            'action' => $this->generateUrl('pedidos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pedidos entity.
     *
     * @Route("/{id}", name="pedidos_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Pedidos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedidos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pedidos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pedidos entity.
     *
     * @Route("/{id}", name="pedidos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pedidos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pedidos'));
    }

    /**
     * Creates a form to delete a Pedidos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pedidos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Finds and displays a Pedidos entity.
     *
     * @Route("/{id}/print", name="pedidos_print")
     * @Method("GET")
     * @Template()
     */
    public function printAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedidos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }
}
