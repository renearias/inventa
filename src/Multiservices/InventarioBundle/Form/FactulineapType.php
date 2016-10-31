<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactulineapType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          //  ->add('numlinea')
           // ->add('codfamilia')
           ->add('codigo',null,array('label' => 'Producto: '))
            ->add('cantidad')
            ->add('precio')
            ->add('articulosdetail', 'collection', array('type' => new ArticulosDetalleType(),
                                                         'allow_add'    => true,
                                                         'allow_delete' => true,
                                                         'by_reference' => false, 
                                                         
                           ))
          //  ->add('importe')
           // ->add('dcto')
            //->add('codfactura')
           // ->add('codproveedor')
        ;    
        
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Multiservices\InventarioBundle\Entity\Factulineap'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'multiservices_inventariobundle_factulineap';
    }
}
