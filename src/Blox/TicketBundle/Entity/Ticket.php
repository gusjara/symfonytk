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
     *
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function setTimeClose() {
        $this->setUpdateAt = (new \DateTime());
    }

    //funcion convert to string
    public function __toString(){
        return (string) $this->ticket;
    }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * Set tipo
     *
     * @param \Blox\TicketBundle\Entity\Tipo $tipo
     *
     * @return Ticket
     */
    public function setTipo(\Blox\TicketBundle\Entity\Tipo $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Blox\TicketBundle\Entity\Tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set categoria
     *
     * @param \Blox\TicketBundle\Entity\Categoria $categoria
     *
     * @return Ticket
     */
    public function setCategoria(\Blox\TicketBundle\Entity\Categoria $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Blox\TicketBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set nivel
     *
     * @param \Blox\TicketBundle\Entity\Nivel $nivel
     *
     * @return Ticket
     */
    public function setNivel(\Blox\TicketBundle\Entity\Nivel $nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return \Blox\TicketBundle\Entity\Nivel
     */
    public function getNivel()
    {
        return $this->nivel;
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
     * Set empresa
     *
     * @param \Blox\TicketBundle\Entity\Empresa $empresa
     *
     * @return Ticket
     */
    public function setEmpresa(\Blox\TicketBundle\Entity\Empresa $empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \Blox\TicketBundle\Entity\Empresa
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set userIdCreate
     *
     * @param \Blox\TicketBundle\Entity\User $userIdCreate
     *
     * @return Ticket
     */
    public function setUserIdCreate(\Blox\TicketBundle\Entity\User $userIdCreate = null)
    {
        $this->userIdCreate = $userIdCreate;

        return $this;
    }

    /**
     * Get userIdCreate
     *
     * @return \Blox\TicketBundle\Entity\User
     */
    public function getUserIdCreate()
    {
        return $this->userIdCreate;
    }

    /**
     * Set userIdClose
     *
     * @param \Blox\TicketBundle\Entity\User $userIdClose
     *
     * @return Ticket
     */
    public function setUserIdClose(\Blox\TicketBundle\Entity\User $userIdClose = null)
    {
        $this->userIdClose = $userIdClose;

        return $this;
    }

    /**
     * Get userIdClose
     *
     * @return \Blox\TicketBundle\Entity\User
     */
    public function getUserIdClose()
    {
        return $this->userIdClose;
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
     * Constructor
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime('now'));
        $this->setUpdateAt(new \DateTime('now'));
    }

    //calcular el tiempo de respuesta
    public function diffTime(){
        // dump($this->createdAt);
        //          die;
        $creado = clone($this->createdAt);
        // $trespuesta = gmdate('d H:i:s', 3600);
        // $expira = 7 * (new \DateTime( 'H:i:s', strtotime('23:00:00')));
        // $creado->add(new \DateInterval('PT5H'));
        // dump($trespuesta);
        // die;
        // $ahora = new \DateTime('now');
         switch ($this->nivel->getNivel()) {
            case 'Critico':
                    // code...
                    $creado->add(new \DateInterval('PT2H'));
                    $ahora = new \DateTime('now');

                    $fechafin = $creado->diff($ahora);
                    // dump($fechafin);
                    // die;
                    return $fechafin->format('%H:%i:%s');
                 break;
            case 'Alto':
                    // code...
                    $creado->add(new \DateInterval('P01D'));
                    $ahora = new \DateTime('now');

                    $fechafin = $creado->diff($ahora);
                    
                    return $fechafin->format('%d dias y %H:%i:%s');
                 break;
            case 'Medio':
                    // code...
                    $creado->add(new \DateInterval('P03D'));
                    $ahora = new \DateTime('now');

                    $fechafin = $creado->diff($ahora);
                    
                    return $fechafin->format('%d dias y %H:%i:%s');
                 break;
            case 'Bajo':
                    // code...
                    $creado->add(new \DateInterval('P07D'));
                    $ahora = new \DateTime('now');

                    $fechafin = $creado->diff($ahora);
                    
                    return $fechafin->format('%d dias y %H:%i:%s');
                 break;
             
             default:
                 // code...
                 break;

         }
        // 15:00 expira a las 17
        // 17 
    }

}
