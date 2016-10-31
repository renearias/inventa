<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PedidosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codfactura')
            ->add('codcliente',null,array('label' => 'Cliente: ',
                                            'placeholder' => 'Seleccione un Cliente',
                                           'attr' => array('class' => 'select2','required'=>'required')
                                          ))
            ->add('fecha')
            //->add('iva')
            
            ->add('estado')
           // ->add('totalpedido')
           // ->add('borrado')
           ->add('pedido_articulos', CollectionType::class, array('entry_type'  => PedidoslineaType::class,
                                                         'allow_add'    => true,
                                                         'allow_delete' => true,
                                                         'by_reference' => false, 
                                                         
                           ));
       
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Multiservices\InventarioBundle\Entity\Pedidos',
            'cascade_validation' => true,
        ));
        
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'multiservices_inventariobundle_pedidos';
    }
}
