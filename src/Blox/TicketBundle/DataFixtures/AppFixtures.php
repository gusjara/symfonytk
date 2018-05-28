<?php
namespace Blox\TicketBundle\DataFixtures;

// namespace App\DataFixtures\ORM;


// use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
// use Doctrine\Common\Persistence\ObjectManager;

use Blox\TicketBundle\Entity\Tipo;
use Blox\TicketBundle\Entity\User;
use Blox\TicketBundle\Entity\Nivel;
use Blox\TicketBundle\Entity\Estado;
use Blox\TicketBundle\Entity\Empresa;
use Blox\TicketBundle\Entity\Categoria;
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

            $user = new User();
            $user->setUsername('user');
            $user->setEmail('user@user.com');
            $user->setPassword('$2y$12$.2kCNU.skSlC0LInVKmKkePXJ1u0YEAmd8WSXK4T0gAosuw2z4x6a');
            $user->addRole('role_admin');
            $user->setEnabled('1');
            $manager->persist($user);

            //creo el estado Verificando
            $estado = new Estado();
            $estado->setEstado('Nuevo');
            $manager->persist($estado);
            
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

            //creo el nivel Bajo y una semana en horas
            $nivel = new Nivel();
            $nivel->setNivel('Bajo');
            $nivel->setTiempoRespuesta('168:00:00');
            $manager->persist($nivel);

            //creo el nivel Medio y 3 dias en horas
            $nivel = new Nivel();
            $nivel->setNivel('Medio');
            $nivel->setTiempoRespuesta('72:00:00');
            $manager->persist($nivel);

            //creo el nivel Alto y un dia en horas
            $nivel = new Nivel();
            $nivel->setNivel('Alto');
            $nivel->setTiempoRespuesta('24:00:00');
            $manager->persist($nivel);

            //creo el nivel Critico y dos horas
            $nivel = new Nivel();
            $nivel->setNivel('Critico');
            $nivel->setTiempoRespuesta('02:00:00');
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

            //crear tipo
            $tipo = new Tipo();
            $tipo->setTipo('Consultas');
            $manager->persist($tipo);


            //categoria
            $categoria = new Categoria();
            $categoria->setCategoria('RRHH');
            $manager->persist($categoria);

            $categoria = new Categoria();
            $categoria->setCategoria('Sistemas');
            $manager->persist($categoria);

            $categoria = new Categoria();
            $categoria->setCategoria('Test');
            $manager->persist($categoria);
     

        $manager->flush();

        # php bin/console doctrine:fixtures:load 
    }
}

