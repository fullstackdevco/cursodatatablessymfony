<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Disponibilidad;

class LoadDisponibilidadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<200;$i++){
            $disponibilidad = new Disponibilidad();
            $disponibilidad->setFecha(new \DateTime());
            $disponibilidad->setHora(new \DateTime());

            $manager->persist($disponibilidad);
        }
        $manager->flush();
    }
}
