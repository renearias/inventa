<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\Pedidoslinea;
use Multiservices\InventarioBundle\Form\PedidoslineaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Pedidoslinea controller.
 *
 * @Route("/pedidoslinea")
 */
class PedidoslineaController extends Controller
{

    /**
     * Lists all Pedidoslinea entities.
     *
     * @Route("/", name="pedidoslinea")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:Pedidoslinea')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Pedidoslinea entity.
     *
     * @Route("/", name="pedidoslinea_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:Pedidoslinea:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Pedidoslinea();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pedidoslinea_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Pedidoslinea entity.
     *
     * @param Pedidoslinea $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pedidoslinea $entity)
    {
        $form = $this->createForm(PedidoslineaType::class, $entity, array(
            'action' => $this->generateUrl('pedidoslinea_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pedidoslinea entity.
     *
     * @Route("/new", name="pedidoslinea_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Pedidoslinea();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Pedidoslinea entity.
     *
     * @Route("/{id}", name="pedidoslinea_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidoslinea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedidoslinea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pedidoslinea entity.
     *
     * @Route("/{id}/edit", name="pedidoslinea_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidoslinea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedidoslinea entity.');
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
    * Creates a form to edit a Pedidoslinea entity.
    *
    * @param Pedidoslinea $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pedidoslinea $entity)
    {
        $form = $this->createForm(PedidoslineaType::class, $entity, array(
            'action' => $this->generateUrl('pedidoslinea_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pedidoslinea entity.
     *
     * @Route("/{id}", name="pedidoslinea_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:Pedidoslinea:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidoslinea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedidoslinea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pedidoslinea_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pedidoslinea entity.
     *
     * @Route("/{id}", name="pedidoslinea_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:Pedidoslinea')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pedidoslinea entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pedidoslinea'));
    }

    /**
     * Creates a form to delete a Pedidoslinea entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pedidoslinea_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
