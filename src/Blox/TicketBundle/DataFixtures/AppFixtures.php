<?php
namespace Blox\TicketBundle\DataFixtures;

// namespace App\DataFixtures\ORM;


// use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
// use Doctrine\Common\Persistence\ObjectManager;

use Blox\TicketBundle\Entity\Empresa;
use Blox\TicketBundle\Entity\Estado;
use Blox\TicketBundle\Entity\Nivel;
use Blox\TicketBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
            $user = new User();
            $user->setUsername('admin');
            $user->setEmail('admin@admin.com');
            $user->setPassword('$2y$12$.2kCNU.skSlC0LInVKmKkePXJ1u0YEAmd8WSXK4T0gAosuw2z4x6a');
            $user->addRole('role_admin');
            $user->setEnabled('1');
            $manager->persist($user);

            //creo el estado Verificando
            $estado = new Estado();
            $estado->setEstado('Verificando');
            $manager->persist($estado);

            //creo el estado Aceptado
            $estado = new Estado();
            $estado->setEstado('Aceptado');
            $manager->persist($estado);

            //creo el estado Rechazado
            $estado = new Estado();
            $estado->setEstado('Rechazado');
            $manager->persist($estado);

            //creo el nivel Bajo
            $nivel = new Nivel();
            $nivel->setNivel('Bajo');
            $manager->persist($nivel);

            //creo el nivel Medio
            $nivel = new Nivel();
            $nivel->setNivel('Medio');
            $manager->persist($nivel);

            //creo el nivel Alto
            $nivel = new Nivel();
            $nivel->setNivel('Alto');
            $manager->persist($nivel);

            //creo empresa Blox
            $empresa = new Empresa();
            $empresa->setEmpresa('Blox');
            $manager->persist($empresa);

            //creo empresa YPF Punto
            $empresa = new Empresa();
            $empresa->setEmpresa('YPF Punto');
            $manager->persist($empresa);

            //creo empresa Luminum
            $empresa = new Empresa();
            $empresa->setEmpresa('Luminum');
            $manager->persist($empresa);

            //creo empresa Grupo Crear
            $empresa = new Empresa();
            $empresa->setEmpresa('Grupo Crear');
            $manager->persist($empresa);
     

        $manager->flush();
    }
}