<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use AppBundle\Entity\User;


class AuthController extends Controller
{

    /**
     * @Route("/", name="main")
     */
    public function indexAction(){
        if ($this->get('security.context')->isGranted('ROLE_OPERATOR')){
            return $this->redirect($this->generateUrl('order_list'));
        }elseif ($this->get('security.context')->isGranted('ROLE_CLIENT')){
            return $this->redirect($this->generateUrl('my_order_list'));
        }else{
            return $this->redirect($this->generateUrl('login'));
        }
    }

    /**
     * @Route("/login", name="login")
     * @Template()
     */
    public function loginAction()
    {

        // создание пользователя
//        $manager = $this->getDoctrine()->getManager();
//        $user = new User();
//        $user->setUsername('admin');
//        $user->setSalt(md5(time()));
//        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
//        $password = $encoder->encodePassword('admin', $user->getSalt());
//        $user->setPassword($password);
//
//        $user->setRoles('ROLE_OPERATOR');
//        $user->setLastName('admin');
//        $user->setFirstName('admin');
//        $user->setSurName('admin');
//        $user->setJobTitle('Главный оператор');
//        $user->setPassport('4585 102545');
//        $user->setPhone('+79161111111');
//
//        $manager->persist($user);
//        $manager->flush($user);

        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        $pages = $this->getDoctrine()->getRepository('AppBundle:Page')->findAll();
        return array(
            'error' => $error,
            'pages' => $pages
        );
    }
}