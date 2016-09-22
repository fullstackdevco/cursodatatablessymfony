<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Principal:body.html.twig');
    }
    /**
     * @Route("/ejemplo1", name="ejemplo1")
     */
    public function ejemplo1Action(Request $request)
    {
        return $this->render('AppBundle:Principal:datatablesestatico.html.twig');
    }

    /**
     * @Route("/ejemplo2", name="ejemplo1")
     */
    public function ejemplo2Action(Request $request)
    {
        return $this->render('AppBundle:Principal:datatablessymfony.html.twig');
    }
}
