<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Factulineap;
use Multiservices\InventarioBundle\Form\FactulineapType;

/**
 * Factulineap controller.
 *
 * @Route("/factulineap")
 */
class FactulineapController extends Controller
{

    /**
     * Lists all Factulineap entities.
     *
     * @Route("/", name="factulineap")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Factulineap')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Factulineap entity.
     *
     * @Route("/", name="factulineap_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Factulineap:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Factulineap();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('factulineap_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Factulineap entity.
     *
     * @param Factulineap $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Factulineap $entity)
    {
        $form = $this->createForm(new FactulineapType(), $entity, array(
            'action' => $this->generateUrl('factulineap_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Factulineap entity.
     *
     * @Route("/new", name="factulineap_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Factulineap();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Factulineap entity.
     *
     * @Route("/{id}", name="factulineap_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Factulineap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factulineap entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Factulineap entity.
     *
     * @Route("/{id}/edit", name="factulineap_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Factulineap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factulineap entity.');
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
    * Creates a form to edit a Factulineap entity.
    *
    * @param Factulineap $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Factulineap $entity)
    {
        $form = $this->createForm(new FactulineapType(), $entity, array(
            'action' => $this->generateUrl('factulineap_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Factulineap entity.
     *
     * @Route("/{id}", name="factulineap_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Factulineap:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Factulineap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factulineap entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('factulineap_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Factulineap entity.
     *
     * @Route("/{id}", name="factulineap_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Factulineap')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Factulineap entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('factulineap'));
    }

    /**
     * Creates a form to delete a Factulineap entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('factulineap_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
