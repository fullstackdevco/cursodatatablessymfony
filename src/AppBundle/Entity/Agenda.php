<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agenda.
 *
 * @ORM\Table(name="agenda")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgendaRepository")
 */
class Agenda
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Disponibilidad", inversedBy="agendas")
     * @ORM\JoinColumn(name="disponibilidad_id", referencedColumnName="id")
     */
    private $disponibilidad;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="agendas")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set disponibilidad
     *
     * @param \AppBundle\Entity\Disponibilidad $disponibilidad
     *
     * @return Agenda
     */
    public function setDisponibilidad(\AppBundle\Entity\Disponibilidad $disponibilidad = null)
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }

    /**
     * Get disponibilidad
     *
     * @return \AppBundle\Entity\Disponibilidad
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return Agenda
     */
    public function setUsuario(\AppBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
