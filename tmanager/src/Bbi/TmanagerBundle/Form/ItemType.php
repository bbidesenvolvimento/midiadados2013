<?php

namespace Bbi\TmanagerBundle\Form;
 

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;
use Bbi\TmanagerBundle\Categoria;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('link')
            //->add('ad')
            //->add('categoria')
            ->add('categoria', 'entity', array(
                'property' => 'nome',
                'class' => 'BbiTmanagerBundle:Categoria', 
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                              ->orderBy('u.nome', 'ASC');
                }));
    }

    /*
    $builder->add('users', 'entity', array(
        'class' => 'AcmeHelloBundle:User',
        'query_builder' => function(EntityRepository $er) {
            return $er->createQueryBuilder('u')
                ->orderBy('u.username', 'ASC');
        },
    ));
    */

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bbi\TmanagerBundle\Entity\Item'
        ));
    }

    public function getName()
    {
        return 'bbi_tmanagerbundle_itemtype';
    }
}
