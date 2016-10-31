<?php

namespace Multiservices\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Multiservices\InventarioBundle\Entity\ArticulosDetalle;
use Multiservices\InventarioBundle\Form\ArticulosDetalleType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * ArticulosDetalle controller.
 *
 * @Route("/articulosdetalle")
 */
class ArticulosDetalleController extends Controller
{

    /**
     * Lists all ArticulosDetalle entities.
     *
     * @Route("/", name="articulosdetalle")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalle')->findAll();
        
        foreach ($entities as $equipo)
                {
                  // $usuario = $em->getRepository('MultiservicesIspControlBundle:Usuarios')->findOneByMac($equipo->getCodunico());
            if (!$usuario)
            {
                $equipo->usuario=null;
            }else
                {
                  $equipo->usuario=$usuario;
                }
              }
        
        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to create a new Usuarios entity.
     *
     * @Route("/qaddequipos", name="qaddequipos")
     * @Method("GET")
     * @Template()
     */
    public function qaddequiposAction()
    {
        $entity = new ArticulosDetalle();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * Creates a new ArticulosDetalle entity.
     *
     * @Route("/", name="articulosdetalle_create")
     * @Method("POST")
     * @Template("MultiservicesInventarioBundle:ArticulosDetalle:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ArticulosDetalle();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($this->get('security.context')->isGranted('ROLE_VINCES'))
        {
            $entity->setNodo($this->get('security.context')->getToken()->getUser()->getNodo());
        }
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articulosdetalle_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ArticulosDetalle entity.
     *
     * @param ArticulosDetalle $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ArticulosDetalle $entity)
    {
        $form = $this->createForm(new ArticulosDetalleType(), $entity, array(
            'action' => $this->generateUrl('articulosdetalle_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ArticulosDetalle entity.
     *
     * @Route("/new", name="articulosdetalle_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ArticulosDetalle();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ArticulosDetalle entity.
     *
     * @Route("/{id}", name="articulosdetalle_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticulosDetalle entity.');
        }else
        {
        
           // $usuario = $em->getRepository('MultiservicesIspControlBundle:Usuarios')->findOneByMac($entity->getCodunico());
            if (!$usuario)
            {
                $entity->usuario=null;
            }else
                {
                  $entity->usuario=$usuario;
                }
              
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ArticulosDetalle entity.
     *
     * @Route("/{id}/edit", name="articulosdetalle_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticulosDetalle entity.');
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
    * Creates a form to edit a ArticulosDetalle entity.
    *
    * @param ArticulosDetalle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ArticulosDetalle $entity)
    {
        $form = $this->createForm(new ArticulosDetalleType(), $entity, array(
            'action' => $this->generateUrl('articulosdetalle_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ArticulosDetalle entity.
     *
     * @Route("/{id}", name="articulosdetalle_update")
     * @Method("PUT")
     * @Template("MultiservicesInventarioBundle:ArticulosDetalle:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticulosDetalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('articulosdetalle_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ArticulosDetalle entity.
     *
     * @Route("/{id}", name="articulosdetalle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MultiservicesInventarioBundle:ArticulosDetalle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ArticulosDetalle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('articulosdetalle'));
    }

    /**
     * Creates a form to delete a ArticulosDetalle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articulosdetalle_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
