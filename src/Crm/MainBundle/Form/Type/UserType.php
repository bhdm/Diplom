<?php

namespace Crm\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\True;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Doctrine\ORM\EntityManager;
use Crm\MainBundle\Form\DataTransformer\CountryToStringTransformer;
//use Crm\MainBundle\Form\DataTransformer\YearToNumberTransformer;
use Crm\MainBundle\Entity\Driver;

class UserType extends AbstractType
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $countryToStringTransformer = new CountryToStringTransformer($this->em);

        $tmps = $this->em->getRepository('CrmMainBundle:Country')->findAll();
        $country = array();
        foreach ( $tmps as $tmp){
            $country[$tmp->getId()] = $tmp->getTitle();
        }

        $builder
            ->add('email', null, array('label' => 'E-mail'))
//            ->add('password', 'password', array(
//                'label'       => 'Придумайте пароль',
//                'constraints' => array(new Regex(array(
//                    'pattern' => '/[а-яА-Я]/',
//                    'match'   => false,
//                    'message' => 'Русские буквы в пароле недопустимы'
//                )))
//            ))
            ->add('lastName', null, array('label' => 'Фамилия'))
            ->add('firstName', null, array('label' => 'Имя'))
            ->add('surName', null, array('label' => 'Отчество'))
            ->add('latLatsName', null, array('label' => 'Фамилия латиницей'))
            ->add('latFirstName', null, array('label' => 'Имя латиницей'))
//            ->add('password', 'password', array('label' => 'Пароль'))
            ->add('snils', null, array('label' => 'СНИЛС'))
            ->add('birthdate', 'date', array(
                'label'  => 'Дата рождения',
                'years'  => range(date('Y') - 111, date('Y')),
                'data'   => new \DateTime('1970-01-01'),
                'format' => 'dd MMMM yyyy',
                'attr' => array('class' => 'date-select')
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'Crm\MainBundle\Entity\User'));
    }

    public function getName()
    {
        return 'user';
    }
}