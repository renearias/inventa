<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticulosDetalleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('codarticulo',null,array('label'=>'Tipo de Artículo '))
           ->add('codunico',null,array('label'=>'COD/MAC/SERIAL '))
           ->add('codfactulinea',null,array('label'=>'Factura(opcional) '))
            ->add('estatus', 'choice', array(
                    'choices' => array('LIBRE' => 'LIBRE','OCUPADO' => 'OCUPADO'),
                    'expanded'  => true,
                    
               
                        ))
            ->add('antiguedad', 'choice', array(
                    'choices' => array('NUEVO' => 'NUEVO','USADO' => 'USADO','DAÑADO' => 'DAÑADO'),
                    'expanded'  => true,
                        ))    
            ->add('observaciones')    
            ->add('atributos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Multiservices\InventarioBundle\Entity\ArticulosDetalle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'multiservices_inventariobundle_articulosdetalle';
    }
}
