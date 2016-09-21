<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Disponibilidad;

class LoadDisponibilidadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
<<<<<<< HEAD
        $hora = new \DateTime();
        for($i=0; $i<200;$i++){
            $fecha = new \DateTime();
            $disponibilidad = new Disponibilidad();
            $disponibilidad->setFecha($fecha);
            $disponibilidad->setHora($hora);
            $hora = $hora->modify("+30 minutes");
            $manager->persist($disponibilidad);
            $manager->flush();
        }
=======
        for($i=0; $i<200;$i++){
            $disponibilidad = new Disponibilidad();
            $disponibilidad->setFecha(new \DateTime());
            $disponibilidad->setHora(new \DateTime());

            $manager->persist($disponibilidad);
        }
        $manager->flush();
>>>>>>> 3cbc707e09296e2bb303f8fcbf392ba93e08c77f
    }
}
