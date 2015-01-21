<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('starts')
            ->add('ends')
            ->add('responsible')
            ->add('contacts')
            ->add('enabled')
            ->add('created')
            ->add('updated')
            ->add('orders')
            ->add('contracts')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Work'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_work';
    }
}
