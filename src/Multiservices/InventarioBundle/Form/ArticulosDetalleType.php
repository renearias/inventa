<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
            ->add('estatus', ChoiceType::class, array(
                    'choices' => array('LIBRE' => 'LIBRE','OCUPADO' => 'OCUPADO'),
                    'expanded'  => true,
                    
               
                        ))
            ->add('antiguedad', ChoiceType::class, array(
                    'choices' => array('NUEVO' => 'NUEVO','USADO' => 'USADO','DAÑADO' => 'DAÑADO'),
                    'expanded'  => true,
                        ))    
            ->add('observaciones')    
            ->add('atributos')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
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
