<?php

namespace Crm\MainBundle\Controller;

use Crm\MainBundle\Form\Type\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Crm\MainBundle\Abby\RussianPassport;
use Symfony\Component\HttpFoundation\Response;

class AbbyController extends Controller
{
    /**
     * @Route("/abby/russian-passport", name="abby_russian_passport")
     */
    public function russianPassportAction(){

        $abby = new RussianPassport();

        $abby->getRequestXml();
        $xml = $abby->getText();
        var_dump($xml);
        exit;
//        $response = new Response();

//        $response->headers->set('Content-type', 'application/xml');
//        $response->setContent(va);
//        $response->send();
//        return $response;
    }
}