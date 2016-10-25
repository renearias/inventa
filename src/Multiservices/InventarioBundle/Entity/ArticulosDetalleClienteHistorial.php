<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticulosDetalleClienteHistorial
 */
class ArticulosDetalleClienteHistorial
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $codusuario;

    /**
     * @var integer
     */
    private $codarticulodetalle;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $tipo;
    /**
     * @var string
     */
    private $observacion;

     public function __construct() {
         
         $this->fecha = new \DateTime();
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
     * Set codusuario
     *
     * @param integer $codusuario
     * @return ArticulosDetalleClienteHistorial
     */
    public function setCodusuario($codusuario)
    {
        $this->codusuario = $codusuario;

        return $this;
    }

    /**
     * Get codusuario
     *
     * @return integer 
     */
    public function getCodusuario()
    {
        return $this->codusuario;
    }

    /**
     * Set codarticulodetalle
     *
     * @param integer $codarticulodetalle
     * @return ArticulosDetalleClienteHistorial
     */
    public function setCodarticulodetalle($codarticulodetalle)
    {
        $this->codarticulodetalle = $codarticulodetalle;

        return $this;
    }

    /**
     * Get codarticulodetalle
     *
     * @return integer 
     */
    public function getCodarticulodetalle()
    {
        return $this->codarticulodetalle;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return ArticulosDetalleClienteHistorial
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
     * Set tipo
     *
     * @param string $tipo
     * @return ArticulosDetalleClienteHistorial
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
     * Set observacion
     *
     * @param string $observacion
     * @return ArticulosDetalleClienteHistorial
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }
    
    
    public function __toString()
    {
      date_default_timezone_set ("America/Guayaquil");
    return $this->getFecha()->format('Y-m-d H:i:s')." - ".$this->getCodarticulodetalle()." - ".$this->getTipo()." - ".$this->getObservacion();
        
    }
}
