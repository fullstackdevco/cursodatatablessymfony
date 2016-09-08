<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Disponibilidad
 *
 * @ORM\Table(name="disponibilidad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DisponibilidadRepository")
 */
class Disponibilidad
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;

    /**
     * @ORM\OneToMany(targetEntity="Agenda", mappedBy="disponibilidad")
     */
    private $disponibilidads;

    public function __construct()
    {
        $this->disponibilidads = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Disponibilidad
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return Disponibilidad
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Add disponibilidad
     *
     * @param \AppBundle\Entity\Agenda $disponibilidad
     *
     * @return Disponibilidad
     */
    public function addDisponibilidad(\AppBundle\Entity\Agenda $disponibilidad)
    {
        $this->disponibilidads[] = $disponibilidad;

        return $this;
    }

    /**
     * Remove disponibilidad
     *
     * @param \AppBundle\Entity\Agenda $disponibilidad
     */
    public function removeDisponibilidad(\AppBundle\Entity\Agenda $disponibilidad)
    {
        $this->disponibilidads->removeElement($disponibilidad);
    }

    /**
     * Get disponibilidads
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisponibilidads()
    {
        return $this->disponibilidads;
    }
}
