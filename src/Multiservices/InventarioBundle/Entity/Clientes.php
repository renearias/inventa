<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientes
 */
class Clientes
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $saldo=0;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $estado=0;

    /**
     * @var string
     */
    private $correo=0;

    /**
     * @var string
     */
    private $telefono=0;


    /**
     * @var \DateTime
     */
    private $instalado;

    /**
     * @var string
     */
    private $cedula=0;

    /**
     * @var string
     */
    private $codigo=0;

    /**
     * @var string
     */
    private $direccion=0;

    /**
     * @var string
     */
    private $referencia=0;


    /**
     * @var string
     */
    private $status=0;
     /**
     * @var string
     */
    private $canton=0;
     /**
     * @var string
     */
    private $provincia=0;
     /**
     * @var string
     */
    private $sector=0;
    /**
     * @var string
     */
    private $registrado=0;
    
    
    //private $pedidos_cliente;
    
    /**
     * @var integer
     */
    private $id;

    public function __construct()
    {
      $this->fecha=new \Datetime();
      $this->instalado=new \Datetime();
    //$this->pedidos_cliente= new \Doctrine\Common\Collections\ArrayCollection();
    //$this->outbox= new \Doctrine\Common\Collections\ArrayCollection();
    //$this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
    //$this->addCreated();
    }
    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Clientes
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }



    /**
     * Set saldo
     *
     * @param string $saldo
     * @return Clientes
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return string 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Clientes
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Clientes
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Clientes
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Clientes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set instalado
     *
     * @param \DateTime $instalado
     * @return Clientes
     */
    public function setInstalado($instalado)
    {
        $this->instalado = $instalado;

        return $this;
    }

    /**
     * Get instalado
     *
     * @return \DateTime 
     */
    public function getInstalado()
    {
        return $this->instalado;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Clientes
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Clientes
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Clientes
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     * @return Clientes
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Clientes
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Set canton
     *
     * @param string $canton
     * @return Clientes
     */
    public function setCanton($canton)
    {
        $this->canton = $canton;

        return $this;
    }

    /**
     * Get canton
     *
     * @return string 
     */
    public function getCanton()
    {
        return $this->canton;
    }
    /**
     * Set provincia
     *
     * @param string $provincia
     * @return Clientes
     */
    public function setProvincia($provincia)
    {
        $this->provincia= $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }
    /**
     * Get id
     *
     * @return integer 
     */
        /**
     * Set sector
     *
     * @param string $sector
     * @return Clientes
     */
    public function setSector($sector)
    {
        $this->sector= $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return string 
     */
    public function getSector()
    {
        return $this->sector;
    }
     /**
     * Set registrado
     *
     * @param string $registrado
     * @return Clientes
     */
    public function setRegistrado($registrado)
    {
        $this->registrado= $registrado;

        return $this;
    }

    /**
     * Get registrado
     *
     * @return string 
     */
    public function getRegistrado()
    {
        return $this->registrado;
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
    public function __toString()
            
    {
        return $this->getNombre();
    }
    
}
