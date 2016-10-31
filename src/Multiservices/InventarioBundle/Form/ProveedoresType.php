<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProveedoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('ruc')
            ->add('direccion')
            ->add('codprovincia')
            ->add('ciudad')
          //  ->add('codentidad')
           // ->add('cuentabancaria')
           // ->add('codpostal')
            ->add('telefono')
            ->add('movil')
            ->add('email')
           // ->add('web')
          //  ->add('borrado')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Multiservices\InventarioBundle\Entity\Proveedores'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'multiservices_inventariobundle_proveedores';
    }
}
