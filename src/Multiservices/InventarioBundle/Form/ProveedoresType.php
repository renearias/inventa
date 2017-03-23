<?php

namespace Multiservices\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FormType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class ProveedoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre' ,TextType::class, array('attr' => array('autocomplete' => 'off')))
            ->add('ruc', TextType::class)
            ->add('direccion' ,TextType::class, array('attr' => array('autocomplete' => 'off')))
            //->add('codprovincia',TextType::class, array('attr' => array('autocomplete' => 'off')))
            ->add('ciudad' ,ChoiceType::class, array('choices'=>[
                                                              'Babahoyo'=>'Babahoyo',
                                                              'Guayaquil'=>'Guayaquil',
                                                              'Quevedo'=>'Quevedo',
                                                              'Ambato'=>'Ambato'
                                                    ],
                                                    'attr' => array('autocomplete' => 'off'
                                                        )))
          //  ->add('codentidad')
           // ->add('cuentabancaria')
           // ->add('codpostal')
            ->add('telefono', NumberType::class,  array('attr' => array('required' => 'required')))
            ->add('movil', NumberType::class)
            ->add('email', EmailType::class)
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
            'data_class' => 'Multiservices\InventarioBundle\Entity\Proveedores',
            'attr' => array('autocomplete' => 'off'),
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
