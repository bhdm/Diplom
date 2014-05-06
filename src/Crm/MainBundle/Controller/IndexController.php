<?php

namespace Crm\MainBundle\Controller;

use Crm\MainBundle\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Crm\MainBundle\Entity\Page;
use Crm\MainBundle\Entity\Faq;
use Crm\MainBundle\Entity\Feedback;
use Crm\MainBundle\Entity\Document;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="main")
     * @Template()
     */
    public function indexAction()
    {
        $indexPage_1 = $this->getDoctrine()->getRepository('CrmMainBundle:Page')->findOneByUrl('indexPage_1');
        $indexPage_2 = $this->getDoctrine()->getRepository('CrmMainBundle:Page')->findOneByUrl('indexPage_2');
        $indexPage_3 = $this->getDoctrine()->getRepository('CrmMainBundle:Page')->findOneByUrl('indexPage_3');
        $indexPage_4 = $this->getDoctrine()->getRepository('CrmMainBundle:Page')->findOneByUrl('indexPage_4');
        return array(
            'indexPage_1'   => $indexPage_1,
            'indexPage_2'   => $indexPage_2,
            'indexPage_3'   => $indexPage_3,
            'indexPage_4'   => $indexPage_4,
        );
    }

    /**
     * @Route("/page/{url}", name="page")
     * @Template()
     */
    public function pageAction($url){
        $page = $this->getDoctrine()->getRepository('CrmMainBundle:Page')->findOneByUrl($url);
        return array( 'page' => $page );
    }

    /**
     * @Route("/doc/id", name="document")
     * @Template()
     */
    public function documentAction($id){
        $page = $this->getDoctrine()->getRepository('CrmMainBundle:Document')->findOneById($id);
        return array( 'page' => $page );
    }

    /**
     * @Route("/docments", name="documents")
     * @Template()
     */
    public function documentsAction(){
        $docs = $this->getDoctrine()->getRepository('CrmMainBundle:Document')->findByEnabled(true);
        return array('documents' => $docs);
    }

    /**
     * @Route("/faq/{catId}", name="faq", defaults={"catId" = 1 })
     * @Template()
     */
    public function faqAction($catId){

        $faqCat = $this->getDoctrine()->getRepository('CrmMainBundle:FaqCategory')->findOneById($catId);
        $faqs = $this->getDoctrine()->getRepository('CrmMainBundle:Faq')->findByCategory($faqCat);
        return array('faqs' => $faqs);
    }

    /**
     * @Route("/status", name="status")
     * @Template()
     */
    public function statusAction(){
        array();
    }

    /**
     * @Route("/feedback", name="feedback")
     * @Template()
     */
    public function feedback(Request $request){

        $feedback = new Feedback();
        $em = $this->getDoctrine()->getManager();
        $formFeedback = $this->createForm(new FeedbackType($em), $feedback);

        $formFeedback->handleRequest($request);

        if ($request->isMethod('POST')) {
            if ($formFeedback->isValid()) {
                $feedback = $formFeedback->getData();
                $em->persist($feedback);
                $em->flush();
            }
        }
        return array ();
    }
}
