<?php

namespace Blox\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nivel
 *
 * @ORM\Table(name="nivel")
 * @ORM\Entity(repositoryClass="Blox\TicketBundle\Repository\NivelRepository")
 */
class Nivel
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
     * @var string
     *
     * @ORM\Column(name="nivel", type="string", length=255, unique=true)
     */
    private $nivel;

    /**
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="nivel")
     */
    private $tickets;


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
     * Set nivel
     *
     * @param string $nivel
     *
     * @return Nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string
     */
    public function getNivel()
    {
        return $this->nivel;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ticket
     *
     * @param \Blox\TicketBundle\Entity\Ticket $ticket
     *
     * @return Nivel
     */
    public function addTicket(\Blox\TicketBundle\Entity\Ticket $ticket)
    {
        $this->tickets[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \Blox\TicketBundle\Entity\Ticket $ticket
     */
    public function removeTicket(\Blox\TicketBundle\Entity\Ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTickets()
    {
        return $this->tickets;
    }
}
