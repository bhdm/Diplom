<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Client;
use AppBundle\Form\MyOrderType;

/**
 * @package AppBundle\Controller
 * @Route("/my-order")
 */
class MyController extends Controller{

    /**
     * @Security("has_role('ROLE_CLIENT')")
     * @Route("/add", name="my_order_add")
     * @Template()
     */
    public function myOrderAddAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $item = new Order();
        $form = $this->createForm(new MyOrderType($em), $item);
        $formData = $form->handleRequest($request);

        if ($request->getMethod() == 'POST'){
            if ($formData->isValid()){
                $item = $formData->getData();
                $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($this->getUser()->getId());
                $item->setClient($client);
                $em->persist($item);
                $em->flush();
                $em->refresh($item);
                return $this->redirect($this->generateUrl('my_order_list'));
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @Security("has_role('ROLE_CLIENT')")
     * @Route("/list", name="my_order_list")
     * @Template()
     */
    public function myOrderListAction(){
        $items = $this->getDoctrine()->getRepository('AppBundle:Order')->findByClient($this->getUser());

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $items,
            $this->get('request')->query->get('order', 1),
            500
        );

        return array('pagination' => $pagination);
    }
}
