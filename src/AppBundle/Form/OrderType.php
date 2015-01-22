<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('closed','choice',  array(
                'empty_value' => false,
                'choices' => array(
                    '1' => 'Закрытая',
                    '0' => 'открытая',
                ),
                'label' => 'Статус',
                'required'  => false,
            ))
            ->add('ends', null, array('label' => 'Планируемая дата окончания'))
            ->add('endsFact', null,  array('label' => 'Фактическая дата окончания'))
            ->add('client', null, array('label' => 'Клиент'))
            ->add('works', null, array('label' => 'работы'))
            ->add('enabled','choice',  array(
                'empty_value' => false,
                'choices' => array(
                    '1' => 'Активен',
                    '0' => 'Заблокирован',
                ),
                'label' => 'Активность',
                'required'  => false,
            ))
            ->add('submit', 'submit', array('label' => 'Сохранить'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Order'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_order';
    }
}
