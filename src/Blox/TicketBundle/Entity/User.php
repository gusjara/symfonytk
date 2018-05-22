<?php

namespace Blox\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Blox\TicketBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\ManyToMany(targetEntity="Categoria", inversedBy="users", cascade={"persist"})
     * @ORM\JoinTable(name="user_categoria")
     */
    protected $categoria;


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
     * Constructor
     */
    public function __construct()
    {
        $this->categoria = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categorium
     *
     * @param \Blox\TicketBundle\Entity\Categoria $categorium
     *
     * @return User
     */
    public function addCategorium(\Blox\TicketBundle\Entity\Categoria $categorium)
    {
        $this->categoria[] = $categorium;

        return $this;
    }

    /**
     * Remove categorium
     *
     * @param \Blox\TicketBundle\Entity\Categoria $categorium
     */
    public function removeCategorium(\Blox\TicketBundle\Entity\Categoria $categorium)
    {
        $this->categoria->removeElement($categorium);
    }

    /**
     * Get categoria
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

   
}
