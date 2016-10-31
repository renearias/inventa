<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PedidoslineaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          //  ->add('numlinea')
         //   ->add('codfamilia')
            ->add('codigo',null,array('label' => 'Producto: '))             
            ->add('cantidad')
            //->add('precio')
            //->add('importe')
            //->add('dcto')
            //->add('codpedido')
          
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Multiservices\InventarioBundle\Entity\Pedidoslinea'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'multiservices_inventariobundle_pedidoslinea';
    }
}
