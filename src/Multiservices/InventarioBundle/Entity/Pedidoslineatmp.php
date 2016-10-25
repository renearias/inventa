<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidoslineatmp
 */
class Pedidoslineatmp
{
    /**
     * @var integer
     */
    private $codfamilia;

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var float
     */
    private $cantidad;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var float
     */
    private $importe;

    /**
     * @var boolean
     */
    private $dcto;

    /**
     * @var integer
     */
    private $codpedido;

    /**
     * @var integer
     */
    private $numlinea;


    /**
     * Set codfamilia
     *
     * @param integer $codfamilia
     * @return Pedidoslineatmp
     */
    public function setCodfamilia($codfamilia)
    {
        $this->codfamilia = $codfamilia;

        return $this;
    }

    /**
     * Get codfamilia
     *
     * @return integer 
     */
    public function getCodfamilia()
    {
        return $this->codfamilia;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Pedidoslineatmp
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
     * Set cantidad
     *
     * @param float $cantidad
     * @return Pedidoslineatmp
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return float 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Pedidoslineatmp
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set importe
     *
     * @param float $importe
     * @return Pedidoslineatmp
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set dcto
     *
     * @param boolean $dcto
     * @return Pedidoslineatmp
     */
    public function setDcto($dcto)
    {
        $this->dcto = $dcto;

        return $this;
    }

    /**
     * Get dcto
     *
     * @return boolean 
     */
    public function getDcto()
    {
        return $this->dcto;
    }

    /**
     * Set codpedido
     *
     * @param integer $codpedido
     * @return Pedidoslineatmp
     */
    public function setCodpedido($codpedido)
    {
        $this->codpedido = $codpedido;

        return $this;
    }

    /**
     * Get codpedido
     *
     * @return integer 
     */
    public function getCodpedido()
    {
        return $this->codpedido;
    }

    /**
     * Set numlinea
     *
     * @param integer $numlinea
     * @return Pedidoslineatmp
     */
    public function setNumlinea($numlinea)
    {
        $this->numlinea = $numlinea;

        return $this;
    }

    /**
     * Get numlinea
     *
     * @return integer 
     */
    public function getNumlinea()
    {
        return $this->numlinea;
    }
}
