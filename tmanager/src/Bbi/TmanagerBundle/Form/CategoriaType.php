<?php

namespace Bbi\TmanagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            //->add('ordem')
            ->add('segmento')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bbi\TmanagerBundle\Entity\Categoria'
        ));
    }

    public function getName()
    {
        return 'bbi_tmanagerbundle_categoriatype';
    }
}
