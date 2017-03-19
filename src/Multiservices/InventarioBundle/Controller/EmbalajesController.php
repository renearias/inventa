<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Embalajes;
use Multiservices\InventarioBundle\Form\EmbalajesType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Embalajes controller.
 *
 * @Route("/embalajes")
 */
class EmbalajesController extends Controller
{

    /**
     * Lists all Embalajes entities.
     *
     * @Route("/", name="embalajes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Embalajes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Embalajes entity.
     *
     * @Route("/", name="embalajes_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Embalajes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Embalajes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('embalajes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Embalajes entity.
     *
     * @param Embalajes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Embalajes $entity)
    {
        $form = $this->createForm(EmbalajesType::class, $entity, array(
            'action' => $this->generateUrl('embalajes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Embalajes entity.
     *
     * @Route("/new", name="embalajes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Embalajes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Embalajes entity.
     *
     * @Route("/{id}", name="embalajes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Embalajes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Embalajes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Embalajes entity.
     *
     * @Route("/{id}/edit", name="embalajes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Embalajes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Embalajes entity.');
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
    * Creates a form to edit a Embalajes entity.
    *
    * @param Embalajes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Embalajes $entity)
    {
        $form = $this->createForm(EmbalajesType::class, $entity, array(
            'action' => $this->generateUrl('embalajes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Embalajes entity.
     *
     * @Route("/{id}", name="embalajes_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Embalajes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Embalajes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Embalajes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('embalajes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Embalajes entity.
     *
     * @Route("/{id}", name="embalajes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Embalajes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Embalajes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('embalajes'));
    }

    /**
     * Creates a form to delete a Embalajes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('embalajes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
