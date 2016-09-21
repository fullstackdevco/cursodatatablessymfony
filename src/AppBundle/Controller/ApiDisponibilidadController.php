<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as FOS;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class ApiDisponibilidadController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @FOS\Get("/disponibilidades", name="get_disponibilidades", options={ "method_prefix" = false }))
     */
    public function cgetAction()
    {
        $datos_personales = array("edad"=>"37", "ciudad_residencia"=>"Pereira", "pais_residencia"=>"Colombia");
        $valores = array("persona"=>"Carlos Pérez", "datos"=>$datos_personales);
        $view = $this->view($valores, 200);

        return $this->handleView($view);
    }// "get_disponibilidades"     [GET] /disponibilidades

}
