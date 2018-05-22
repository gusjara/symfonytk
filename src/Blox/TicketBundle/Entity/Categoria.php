<?php

namespace Blox\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="Blox\TicketBundle\Repository\CategoriaRepository")
 */
class Categoria
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
     * @ORM\Column(name="categoria", type="string", length=150)
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="categoria")
    */
    protected $tickets;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="categoria", cascade="persist")
     */
    protected $users;

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
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
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
     * @param \Blox\TicketBundle\Entity\Ticket $tickets
     *
     * @return Categoria
     */
    public function addTicket(\Blox\TicketBundle\Entity\Ticket $ticket)
    {
        $this->tickets[] = $tickets;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \Blox\TicketBundle\Entity\Ticket $ticket
     */
    public function removeTicket(\Blox\TicketBundle\Entity\Ticket $tickets)
    {
        $this->tickets->removeElement($tickets);
    }

    /**
     * Get ticket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTicket()
    {
        return $this->tickets;
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

    /**
     * Add user
     *
     * @param \Blox\TicketBundle\Entity\User $user
     *
     * @return Categoria
     */
    public function addUser(\Blox\TicketBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Blox\TicketBundle\Entity\User $user
     */
    public function removeUser(\Blox\TicketBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __toString(){
        return (string)$this->categoria;
    }
}
