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
    public function cgetAction(Request $request)
    {
        // {
        //     "draw": 1,
        //     "recordsTotal": 57,
        //     "recordsFiltered": 57,
        //     "data": [
        //         {
        //             "first_name": "Angelica",
        //             "last_name": "Ramos",
        //             "position": "System Architect",
        //             "office": "London",
        //             "start_date": "9th Oct 09",
        //             "salary": "$2,875"
        //         },
        //         {
        //             "first_name": "Ashton",
        //             "last_name": "Cox",
        //             "position": "Technical Author",
        //             "office": "San Francisco",
        //             "start_date": "12th Jan 09",
        //             "salary": "$4,800"
        //         },
        //         ...
        //     ]
        // }
        // $repository = $this->getDoctrine()->getRepository('AppBundle:Disponibilidad');
        // $datos = $repository->findAll();

        $em = $this->getDoctrine()->getManager();

        $disponibilidad = $this->getDoctrine()->getRepository('AppBundle:Disponibilidad');
        $ordenadores = array("d.id", "d.fecha", "d.hora");

        $datos = $disponibilidad->createQueryBuilder('d')
        ->where('d.fecha like :searchvalue OR d.hora like :searchvalue')
        ->orderBy($ordenadores[$request->query->get('order')[0]["column"]], $request->query->get('order')[0]["dir"])
        ->setFirstResult($request->query->get('start'))
        ->setMaxResults($request->query->get('lenght'))
        ->setParameter('searchvalue', '%'.$request->query->get('search')["value"].'%')
        ->getQuery()
        ->getResult();

        $cantidaddatos = $disponibilidad->createQueryBuilder('d')
        ->select('COUNT(d.id)')
        ->where('d.fecha like :searchvalue OR d.hora like :searchvalue')
        ->orderBy($ordenadores[$request->query->get('order')[0]["column"]], $request->query->get('order')[0]["dir"])
        ->setParameter('searchvalue', '%'.$request->query->get('search')["value"].'%')
        ->getQuery()
        ->getSingleScalarResult();

        $valores= array();

        foreach ($datos as $dato) {
            $valores[] = array('id' => $dato->getId(),
             'fecha' => $dato->getFecha()->format("Y-m-d"),
             'hora' => $dato->getHora()->format("H:i:s"),
             );
        }

        $respuesta = array(
            'draw' => $request->query->get('draw'),
            'recordsTotal' => $cantidaddatos,
            'recordsFiltered' => $cantidaddatos,
            'data' => $valores,
        );
        $view = $this->view($respuesta, 200);

        return $this->handleView($view);
    }// "get_disponibilidades"     [GET] /disponibilidades
}
