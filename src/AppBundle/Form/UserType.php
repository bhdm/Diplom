<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', null, array('label' => 'Фамилия'))
            ->add('firstName', null, array('label' => 'Имя'))
            ->add('surName', null, array('label' => 'Отчество'))
            ->add('jobTitle', null, array('label' => 'Должность'))
            ->add('ads', null, array('label' => 'Адрес'))
            ->add('phone', null, array('label' => 'Телефон'))
            ->add('passport', null, array('label' => 'Паспорт'))
            ->add('inn', null, array('label' => 'ИНН'))
            ->add('snils', null, array('label' => 'СНИЛС'))
            ->add('dateStarts', null, array('label' => 'Дата приема'))
            ->add('dateEnds', null, array('label' => 'Дата увольнения'))
            ->add('username', null, array('label' => 'Логин'))
            ->add('password', 'repeated', array('type' => 'password', 'invalid_message' => 'пароли не совпадают', 'first_options'  => array('label' => 'Пароль'),
                'second_options' => array('label' => 'Повторите пароль'),))

            ->add('userRoles','choice',  array(
                'empty_value' => false,
                'choices' => array(
                    'ROLE_OPERATOR' => 'Администратор',
                ),
                'label' => 'Активность',
                'required'  => false,
            ))
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
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_user';
    }
}
