<?php

namespace Blox\TicketBundle\Controller;

use Blox\TicketBundle\Entity\Ticket;

use Symfony\Component\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ApiTicketController extends Controller
{
    public function getTicketAction($param){

        $em = $this->getDoctrine()->getManager();
        $tickets = $em->getRepository(Ticket::class)->findAll();

      /*  $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });

        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers, $encoders);*/

        return ['Tickets' => $tickets];
    }
}