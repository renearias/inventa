<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Atributos;
use Multiservices\InventarioBundle\Form\AtributosType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Atributos controller.
 *
 * @Route("/atributos")
 */
class AtributosController extends Controller
{

    /**
     * Lists all Atributos entities.
     *
     * @Route("/", name="atributos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Atributos')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Atributos entity.
     *
     * @Route("/", name="atributos_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Atributos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Atributos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('atributos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Atributos entity.
     *
     * @param Atributos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Atributos $entity)
    {
        $form = $this->createForm(new AtributosType(), $entity, array(
            'action' => $this->generateUrl('atributos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Atributos entity.
     *
     * @Route("/new", name="atributos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Atributos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Atributos entity.
     *
     * @Route("/{id}", name="atributos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Atributos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Atributos entity.
     *
     * @Route("/{id}/edit", name="atributos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Atributos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributos entity.');
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
    * Creates a form to edit a Atributos entity.
    *
    * @param Atributos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Atributos $entity)
    {
        $form = $this->createForm(new AtributosType(), $entity, array(
            'action' => $this->generateUrl('atributos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Atributos entity.
     *
     * @Route("/{id}", name="atributos_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Atributos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Atributos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('atributos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Atributos entity.
     *
     * @Route("/{id}", name="atributos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Atributos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Atributos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('atributos'));
    }

    /**
     * Creates a form to delete a Atributos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('atributos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
