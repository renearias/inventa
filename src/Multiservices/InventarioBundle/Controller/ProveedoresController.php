<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Proveedores;
use Multiservices\InventarioBundle\Form\ProveedoresType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Proveedores controller.
 *
 * @Route("/proveedores")
 */
class ProveedoresController extends Controller
{

    /**
     * Lists all Proveedores entities.
     *
     * @Route("/", name="proveedores")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Proveedores')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Proveedores entity.
     *
     * @Route("/", name="proveedores_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Proveedores:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Proveedores();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proveedores_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Proveedores entity.
     *
     * @param Proveedores $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Proveedores $entity)
    {
        $form = $this->createForm(ProveedoresType::class, $entity, array(
            'action' => $this->generateUrl('proveedores_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Proveedores entity.
     *
     * @Route("/new", name="proveedores_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Proveedores();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Proveedores entity.
     *
     * @Route("/{id}", name="proveedores_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Proveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proveedores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Proveedores entity.
     *
     * @Route("/{id}/edit", name="proveedores_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Proveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proveedores entity.');
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
    * Creates a form to edit a Proveedores entity.
    *
    * @param Proveedores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Proveedores $entity)
    {
        $form = $this->createForm(ProveedoresType::class, $entity, array(
            'action' => $this->generateUrl('proveedores_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Proveedores entity.
     *
     * @Route("/{id}", name="proveedores_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Proveedores:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Proveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proveedores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proveedores_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Proveedores entity.
     *
     * @Route("/{id}", name="proveedores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Proveedores')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Proveedores entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('proveedores'));
    }

    /**
     * Creates a form to delete a Proveedores entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proveedores_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
