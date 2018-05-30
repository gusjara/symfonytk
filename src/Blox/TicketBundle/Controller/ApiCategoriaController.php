<?php

namespace Blox\TicketBundle\Controller;

use Blox\TicketBundle\Entity\Categoria;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ApiCategoriaController extends Controller
{
   
    public function getCategoriaAction($param)
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository(Categoria::class)->findAll();
 		
 		return ['Categorias' => $categorias];
        
    }

}
