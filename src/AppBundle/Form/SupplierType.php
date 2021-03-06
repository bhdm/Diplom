<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SupplierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Название'))
            ->add('fullTitle', null, array('label' => 'Полное название'))

            ->add('ads', null, array('label' => 'Адрес'))
            ->add('phone', null, array('label' => 'Телефон'))
            ->add('inn', null, array('label' => 'ИНН'))
            ->add('kpp', null, array('label' => 'КПП'))
            ->add('ogrn', null, array('label' => 'ОГРН'))
            ->add('bik', null, array('label' => 'БИК'))
            ->add('bank', null, array('label' => 'Отделение банка'))
            ->add('expenseBank', null, array('label' => 'Кор. счет'))
            ->add('expense', null, array('label' => 'Р. счет'))
            ->add('comment', null, array('label' => 'Комментарий'))
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
            'data_class' => 'AppBundle\Entity\Supplier'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_supplier';
    }
}
