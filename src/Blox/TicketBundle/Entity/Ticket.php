<?php

namespace Blox\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Entity(repositoryClass="Blox\TicketBundle\Repository\TicketRepository")
 * @ORM\Table(name="ticket")
 * @ORM\HasLifecycleCallbacks
 */
class Ticket
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
     * @ORM\ManyToOne(targetEntity="Tipo", inversedBy="tickets")
     * @ORM\JoinColumn(name="tipo_id", referencedColumnName="id", nullable=false)
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="tickets")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id", nullable=false)
     */
    private $categoria;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Nivel", inversedBy="tickets")
     * @ORM\JoinColumn(name="nivel_id", referencedColumnName="id", nullable=false)
     */
    private $nivel;

    /**
     * @ORM\ManyToOne(targetEntity="Estado", inversedBy="tickets")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id", nullable=false)
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="tickets")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id", nullable=false)
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id_create", referencedColumnName="id", nullable=true)
     */
    private $userIdCreate;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id_close", referencedColumnName="id", nullable=true)
     */
    private $userIdClose;

    //Creo este nuevo campo para guardar los usuario que ven los tickets. 
    //al hacer click en el boton ver se va guardar el nombre del usuario que vio.
    /**
     * @var string
     *
     * @ORM\Column(name="users_view", type="string", nullable=true)
     */
    private $usersView;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="respuesta", type="text", nullable=true)
     */
    private $respuesta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime", nullable=false)
     */
    private $updateAt;


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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Ticket
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Ticket
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
     * Set nivel
     *
     * @param string $nivel
     *
     * @return Ticket
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
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Ticket
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    
    /**
     * Set estado
     *
     * @param \Blox\TicketBundle\Entity\Estado $estado
     *
     * @return Ticket
     */
    public function setEstado(\Blox\TicketBundle\Entity\Estado $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \Blox\TicketBundle\Entity\Estado
     */
    public function getEstado()
    {
        return $this->estado;
    }
    

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set userIdCreate
     *
     * @param string $userIdCreate
     *
     * @return Ticket
     */
    public function setUserIdCreate($userIdCreate)
    {
        $this->userIdCreate = $userIdCreate;

        return $this;
    }

    /**
     * Get userIdCreate
     *
     * @return string
     */
    public function getUserIdCreate()
    {
        return $this->userIdCreate;
    }

    /**
     * Set userIdClose
     *
     * @param string $userIdClose
     *
     * @return Ticket
     */
    public function setUserIdClose($userIdClose)
    {
        $this->userIdClose = $userIdClose;

        return $this;
    }

    /**
     * Get userIdClose
     *
     * @return string
     */
    public function getUserIdClose()
    {
        return $this->userIdClose;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Ticket
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Ticket
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Ticket
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

   
    /**
     * Set respuesta
     *
     * @param string $respuesta
     *
     * @return Ticket
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get respuesta
     *
     * @return string
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

     /**
     * Constructor
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
        if( $this->getUpdateAt() == null){
            $this->setUpdateAt(new \DateTime());
        }
        
    }

    /**
     *
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function setTimeClose() {
        $this->setUpdateAt = (new \DateTime());
    }

    public function __toString(){
        return (string) $this->ticket;
    }


    /**
     * Set usersView
     *
     * @param string $usersView
     *
     * @return Ticket
     */
    public function setUsersView($usersView)
    {
        $this->usersView = $usersView;

        return $this;
    }

    /**
     * Get usersView
     *
     * @return string
     */
    public function getUsersView()
    {
        return $this->usersView;
    }
}
