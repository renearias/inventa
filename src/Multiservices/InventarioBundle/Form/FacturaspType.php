<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FacturaspType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
           // ->add('iva')
          //  ->add('estado')
            ->add('totalfactura')
            ->add('fechapago')
          //  ->add('borrado')
            ->add('codfactura')
            ->add('codproveedor',null,array('label' => 'Proveedor: ',
                                            
                                            'placeholder'=>'Seleccione Proovedor',
                                            'required'=>true))
            ->add('compra_articulos', CollectionType::class, array('entry_type' => FactulineapType::class,
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
            'data_class' => 'Multiservices\InventarioBundle\Entity\Facturasp',
            'cascade_validation' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'multiservices_inventariobundle_facturasp';
    }
}
