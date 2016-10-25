<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Multiservices\InventarioBundle\Entity\ArticulosDetalleClienteHistorial;
use Multiservices\InventarioBundle\Form\ArticulosDetalleClienteHistorialType;

/**
 * ArticulosDetalleClienteHistorial controller.
 *
 * @Route("/articulosdetalleclientehistorial")
 */
class ArticulosDetalleClienteHistorialController extends Controller
{

    /**
     * Lists all ArticulosDetalleClienteHistorial entities.
     *
     * @Route("/", name="articulosdetalleclientehistorial")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
         if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
            $entities = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalleClienteHistorial')->findAll();
        }elseif ($this->get('security.context')->isGranted('ROLE_VINCES')) 
        {
            $query = $em->createQuery(
            'SELECT h
                FROM MultiservicesInventarioBundle:ArticulosDetalleClienteHistorial h JOIN
                h.codusuario u
                WHERE u.nodo = :nodo'
            )->setParameter('nodo', 'Vinces');
            
        $entities = $query->getResult();
        }

    

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ArticulosDetalleClienteHistorial entity.
     *
     * @Route("/", name="articulosdetalleclientehistorial_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:ArticulosDetalleClienteHistorial:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ArticulosDetalleClienteHistorial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articulosdetalleclientehistorial_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ArticulosDetalleClienteHistorial entity.
     *
     * @param ArticulosDetalleClienteHistorial $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ArticulosDetalleClienteHistorial $entity)
    {
        $form = $this->createForm(new ArticulosDetalleClienteHistorialType(), $entity, array(
            'action' => $this->generateUrl('articulosdetalleclientehistorial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ArticulosDetalleClienteHistorial entity.
     *
     * @Route("/new", name="articulosdetalleclientehistorial_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ArticulosDetalleClienteHistorial();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ArticulosDetalleClienteHistorial entity.
     *
     * @Route("/{id}", name="articulosdetalleclientehistorial_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalleClienteHistorial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticulosDetalleClienteHistorial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ArticulosDetalleClienteHistorial entity.
     *
     * @Route("/{id}/edit", name="articulosdetalleclientehistorial_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalleClienteHistorial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticulosDetalleClienteHistorial entity.');
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
    * Creates a form to edit a ArticulosDetalleClienteHistorial entity.
    *
    * @param ArticulosDetalleClienteHistorial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ArticulosDetalleClienteHistorial $entity)
    {
        $form = $this->createForm(new ArticulosDetalleClienteHistorialType(), $entity, array(
            'action' => $this->generateUrl('articulosdetalleclientehistorial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ArticulosDetalleClienteHistorial entity.
     *
     * @Route("/{id}", name="articulosdetalleclientehistorial_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:ArticulosDetalleClienteHistorial:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalleClienteHistorial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticulosDetalleClienteHistorial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('articulosdetalleclientehistorial_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ArticulosDetalleClienteHistorial entity.
     *
     * @Route("/{id}", name="articulosdetalleclientehistorial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalleClienteHistorial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ArticulosDetalleClienteHistorial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('articulosdetalleclientehistorial'));
    }

    /**
     * Creates a form to delete a ArticulosDetalleClienteHistorial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articulosdetalleclientehistorial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
