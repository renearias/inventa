<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticulosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('codfamilia',null,array('label'=>'Categoria'))
         //   ->add('referencia')
          // ->add('descripcionCorta',null,array('label'=>'Descripcion Corta'))     
           ->add('descripcion',null,array('label'=>'Descripcion'))     
          //  ->add('impuesto')
           // ->add('codproveedor1',null,array('label'=>'Proveedor 1'))     
           // ->add('codproveedor2',null,array('label'=>'Proveedor 2'))     
          
          //  ->add('codubicacion')
            ->add('stock',null,array('label'=>'Articulos en Stock'))     
         //   ->add('stockMinimo')
         //   ->add('avisoMinimo')
         //   ->add('datosProducto')
            ->add('fechaAlta',null,array('label'=>'Fecha de Alta'))     
            ->add('codembalaje')
         //   ->add('unidadesCaja')
         //   ->add('precioTicket')
        //    ->add('modificarTicket')
            ->add('observaciones')
            // ->add('precioCompra',null,array('label'=>'Precio de Compra'))     
            //->add('precioAlmacen',null,array('label'=>'Precio de Distribuidor'))     
             //->add('precioTienda',null,array('label'=>'Precio de Tienda'))     
             //->add('precioPvp',null,array('label'=>'Precio de Venta al Publico'))     
             
          //  ->add('precioIva')
            ///->add('codigobarras')
            //->add('imagen')
           // ->add('borrado')
            // ->add('atributos',null,array('label'=>'Atributos/Propiedades'))     

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Multiservices\InventarioBundle\Entity\Articulos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'multiservices_inventariobundle_articulos';
    }
}
