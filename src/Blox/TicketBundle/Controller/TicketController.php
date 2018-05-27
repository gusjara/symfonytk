<?php

namespace Blox\TicketBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class TicketController extends BaseAdminController
{
    public function updateEntity($entity)
    {
        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt(new \DateTime());
        }

        parent::updateEntity($entity);
    }

    protected function newAction()
    {
        $this->dispatch(EasyAdminEvents::PRE_NEW);

        $entity = $this->executeDynamicMethod('createNew<EntityName>Entity');

        $easyadmin = $this->request->attributes->get('easyadmin');
        $easyadmin['item'] = $entity;
        $this->request->attributes->set('easyadmin', $easyadmin);

        $fields = $this->entity['new']['fields'];

        $newForm = $this->executeDynamicMethod('create<EntityName>NewForm', array($entity, $fields));

        $newForm->handleRequest($this->request);
        if ($newForm->isSubmitted() && $newForm->isValid()) {

            $repo_estado = current($this->getDoctrine()->getRepository('BloxTicketBundle:Estado')->findByEstado('Nuevo'));
            
            $entity->setEstado($repo_estado);


            $this->dispatch(EasyAdminEvents::PRE_PERSIST, array('entity' => $entity));

            $this->executeDynamicMethod('prePersist<EntityName>Entity', array($entity));
            $this->executeDynamicMethod('persist<EntityName>Entity', array($entity));

            $this->dispatch(EasyAdminEvents::POST_PERSIST, array('entity' => $entity));

            return $this->redirectToReferrer();
        }

        $this->dispatch(EasyAdminEvents::POST_NEW, array(
            'entity_fields' => $fields,
            'form' => $newForm,
            'entity' => $entity,
        ));

        $parameters = array(
            'form' => $newForm->createView(),
            'entity_fields' => $fields,
            'entity' => $entity,
        );

        return $this->executeDynamicMethod('render<EntityName>Template', array('new', $this->entity['templates']['new'], $parameters));
    }


   /* protected function editAction()
    {
        $this->dispatch(EasyAdminEvents::PRE_EDIT);

        $id = $this->request->query->get('id');
        $easyadmin = $this->request->attributes->get('easyadmin');
        $entity = $easyadmin['item'];

        if ($this->request->isXmlHttpRequest() && $property = $this->request->query->get('property')) {
            $newValue = 'true' === mb_strtolower($this->request->query->get('newValue'));
            $fieldsMetadata = $this->entity['list']['fields'];

            if (!isset($fieldsMetadata[$property]) || 'toggle' !== $fieldsMetadata[$property]['dataType']) {
                throw new \RuntimeException(sprintf('The type of the "%s" property is not "toggle".', $property));
            }

            $this->updateEntityProperty($entity, $property, $newValue);

            // cast to integer instead of string to avoid sending empty responses for 'false'
            return new Response((int) $newValue);
        }

        $fields = $this->entity['edit']['fields'];

        $editForm = $this->executeDynamicMethod('create<EntityName>EditForm', array($entity, $fields));
        $deleteForm = $this->createDeleteForm($this->entity['name'], $id);

        $editForm->add('save', SubmitType::class, array('class' => 'hidden'));

        $editForm->handleRequest($this->request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $entity->setUpdateAt(new \DateTime());
           //$entity->setTimeClose();

            $this->dispatch(EasyAdminEvents::PRE_UPDATE, array('entity' => $entity));
            
            $this->executeDynamicMethod('preUpdate<EntityName>Entity', array($entity));
            $this->executeDynamicMethod('update<EntityName>Entity', array($entity));

            $this->dispatch(EasyAdminEvents::POST_UPDATE, array('entity' => $entity));

            return $this->redirectToReferrer();
        }

        $this->dispatch(EasyAdminEvents::POST_EDIT);

        $parameters = array(
            'form' => $editForm->createView(),
            'entity_fields' => $fields,
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );

        return $this->executeDynamicMethod('render<EntityName>Template', array('edit', $this->entity['templates']['edit'], $parameters));
    }*/



    /**
     * @Route(path = "/admin/ticket/success", name = "ticket_success")
     * 
     */
    public function ticketSuccessAction(Request $request)
    {
        // change the properties of the given entity and save the changes
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('BloxTicketBundle:Ticket');

        $id = $request->query->get('id');
        $entity = $repository->find($id);
       
        $repo_estado = current($this->getDoctrine()->getRepository('BloxTicketBundle:Estado')->findByEstado('Aceptado'));

        //$r = $entity->getEstado()->getId();
        $entity->setEstado($repo_estado);

        $em->flush();

        // redirect to the 'list' view of the given entity
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
            //'entity' => $this->request->query->get('entity'),
        ));
    }

     /**
     * @Route(path = "/admin/ticket/rejected", name = "ticket_rejected")
     * 
     */
    public function ticketRejectedAction(Request $request)
    {
        // change the properties of the given entity and save the changes
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('BloxTicketBundle:Ticket');

        $id = $request->query->get('id');
        $entity = $repository->find($id);
       
        $repo_estado = current($this->getDoctrine()->getRepository('BloxTicketBundle:Estado')->findByEstado('Rechazado'));

        //$r = $entity->getEstado()->getId();
        $entity->setEstado($repo_estado);

        $em->flush();

        // redirect to the 'list' view of the given entity
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
            //'entity' => $this->request->query->get('entity'),
        ));
        
    }

    /**
     * 
     */
    protected function showAction()
    {
        $this->dispatch(EasyAdminEvents::PRE_SHOW);

        $id = $this->request->query->get('id');
        $easyadmin = $this->request->attributes->get('easyadmin');
        $entity = $easyadmin['item'];

        $entity->getNivel()->getTiempoRespuesta();
        
        $fields = $this->entity['show']['fields'];
        $deleteForm = $this->createDeleteForm($this->entity['name'], $id);
    

        $this->dispatch(EasyAdminEvents::POST_SHOW, array(
            'deleteForm' => $deleteForm,
            'fields' => $fields,
            'entity' => $entity,
        ));

        $parameters = array(
            'entity' => $entity,
            'fields' => $fields,
            'delete_form' => $deleteForm->createView(),
        );

        return $this->executeDynamicMethod('render<EntityName>Template', array('show', $this->entity['templates']['show'], $parameters));
    }

    /**
     * @Route("ticket_verified", name="ticket_verified")
     */
    public function ticket_verified(Request $request){
        // change the properties of the given entity and save the changes
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('BloxTicketBundle:Ticket');

        $id = $request->query->get('id');
        $entity = $repository->find($id);


        $repo_estado = current($this->getDoctrine()->getRepository('BloxTicketBundle:Estado')->findByEstado('Verificando'));

        //$r = $entity->getEstado()->getId();
        $entity->setEstado($repo_estado);

        //insertar id de los usuario
        $user = $this->getUser()->getUserName(); //obtener el nombre del usuario autenticado
        
        $arrayUser=array();
        array_push($arrayUser, $user);
        $entity->setUsersView(implode($arrayUser));

        $em->flush();

        // redirect to the 'list' view of the given entity
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
        ));

    }
        
}
