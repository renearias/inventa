<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticulosDetalle
 */
class ArticulosDetalle
{
    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var integer
     */
    private $codarticulo;
    
    /**
     * @var string
     */
    private $codunico;

    /**
     * @var string
     */
    private $estatus="LIBRE";
    
    /**
     * @var string
     */
    private $antiguedad="NUEVO";
    /**
     * @var string
     */
    private $observaciones;
    /**
     * @var string
     */
    private $atributos;
    /**
     * @var Factulineap
     */
    private $codfactulinea;
    


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
     * Set codarticulo
     *
     * @param Articulos
     * @return ArticulosDetalle
     */
    public function setCodarticulo(Articulos $codarticulo)
    {
        $this->codarticulo = $codarticulo;

        return $this;
    }

    /**
     * Get codarticulo
     *
     * @return Articulos 
     */
    public function getCodarticulo()
    {
        return $this->codarticulo;
    }
    /**
     * Set codunico
     *
     * @param string $codunico
     * @return ArticulosDetalle
     */
    public function setCodunico($codunico)
    {
        $this->codunico = $codunico;

        return $this;
    }

    /**
     * Get codunico
     *
     * @return string 
     */
    public function getCodunico()
    {
        return $this->codunico;
    }
    /**
     * Set estatus
     *
     * @param string $estatus
     * @return ArticulosDetalle
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return string 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }
    
     /**
     * Set antiguedad
     *
     * @param string $antiguedad
     * @return ArticulosDetalle
     */
    public function setAntiguedad($antiguedad)
    {
        $this->antiguedad = $antiguedad;

        return $this;
    }

    /**
     * Get antiguedad
     *
     * @return string 
     */
    public function getAntiguedad()
    {
        return $this->antiguedad;
    }
    
    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Articulos
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
    /**
     * Set atributos
     *
     * @param string $atributos
     * @return ArticulosDetalle
     */
    public function setAtributos($atributos)
    {
        $this->atributos = $atributos;

        return $this;
    }

    /**
     * Get atributos
     *
     * @return string 
     */
    public function getAtributos()
    {
        return $this->atributos;
    }
    /**
     * Set codarticulo
     *
     * @param Factulineap
     * @return ArticulosDetalle
     */
    public function setFactulinea(Factulineap $codfactulinea)
    {
        $this->codfactulinea = $codfactulinea;

        return $this;
    }

    /**
     * Get codarticulo
     *
     * @return Factulineap 
     */
    public function getCodfactulinea()
    {
        return $this->codfactulinea;
    }
    /**
     * Set codfactulinea
     *
     * @param Factulineap
     * @return ArticulosDetalle
     */
    public function setCodfactulinea(Factulineap $codfactulinea)
    {
        $this->codfactulinea = $codfactulinea;

        return $this;
    }

    /**
     * Get factulinea
     *
     * @return Factulineap 
     */
    public function getFactulinea()
    {
        return $this->codfactulinea;
    }
    
    
    /**
     * Get codfactura
     *
     * @return Facturap 
     */
    public function getCodfactura()
    {
       
       if (isset($this->codfactulinea))
       {    
        return $this->codfactulinea->getCodfactura();
       }else
           return null;
    }
    
    
    /**
     * Get Fechacompra
     *
     * @return string
     */
    public function getFechacompra()
    {
       
       if (isset($this->codfactulinea))
       {    
        return $this->codfactulinea->getCodfactura()->getFecha();
       }else
           return null;
    }
    
    
    
    
    public function __toString()
    {
      //$nom="hola ".$this->getCodunico();
    return $this->getCodarticulo()."|".$this->getCodunico()."|".$this->getEstatus()."|".$this->getAntiguedad();
    }
}
