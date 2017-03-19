<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Familias;
use Multiservices\InventarioBundle\Form\FamiliasType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Familias controller.
 *
 * @Route("/familias")
 */
class FamiliasController extends Controller
{

    /**
     * Lists all Familias entities.
     *
     * @Route("/", name="familias")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Familias')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Familias entity.
     *
     * @Route("/", name="familias_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Familias:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Familias();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setBorrado(0);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('familias_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Familias entity.
     *
     * @param Familias $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Familias $entity)
    {
        $form = $this->createForm(FamiliasType::class, $entity, array(
            'action' => $this->generateUrl('familias_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Familias entity.
     *
     * @Route("/new", name="familias_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Familias();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Familias entity.
     *
     * @Route("/{id}", name="familias_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Familias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Familias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Familias entity.
     *
     * @Route("/{id}/edit", name="familias_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Familias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Familias entity.');
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
    * Creates a form to edit a Familias entity.
    *
    * @param Familias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Familias $entity)
    {
        $form = $this->createForm(FamiliasType::class, $entity, array(
            'action' => $this->generateUrl('familias_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Familias entity.
     *
     * @Route("/{id}", name="familias_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Familias:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Familias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Familias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('familias_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Familias entity.
     *
     * @Route("/{id}", name="familias_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Familias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Familias entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('familias'));
    }

    /**
     * Creates a form to delete a Familias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('familias_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
