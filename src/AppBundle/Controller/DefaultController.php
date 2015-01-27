<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Client;
use AppBundle\Form\ClientType;

/**
 * @package AppBundle\Controller
 * @Route("/")
 */
class DefaultController extends Controller{

    /**
     * @Route("/pages/{url}", name="pages")
     * @Template()
     */
    public function pageAction($url){
        $page = $this->getDoctrine()->getRepository('AppBundle:Page')->findOneByUrl($url);
        return array('page' => $page);
    }
}
