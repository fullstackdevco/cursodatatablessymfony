<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as FOS;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @FOS\Get("/prueba", name="get_prueba", options={ "method_prefix" = false }))
     */
    public function cgetPruebaAction()
    {
        $datos_personales = array("edad"=>"37", "ciudad_residencia"=>"Pereira", "pais_residencia"=>"Colombia");
        $valores = array("persona"=>"Carlos Pérez", "datos"=>$datos_personales);
        $view = $this->view($valores, 200);

        return $this->handleView($view);
    }

}
