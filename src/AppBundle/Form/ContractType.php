<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContractType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', null, array('label' => 'Номер договора'))
            ->add('title', null, array('label' => 'Название'))
            ->add('dateStarts', null, array('label' => 'Дата заключения'))
            ->add('dateEnds', null, array('label' => 'Дата окончания'))
            ->add('company', null, array('label' => 'Компания'))
            ->add('comment', null, array('label' => 'Комментарий'))
            ->add('submit', 'submit', array('label' => 'Сохранить'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contract'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_contract';
    }
}
