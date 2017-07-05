<?php

namespace Multiservices\InventarioBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Multiservices\InventarioBundle\Entity\Articulos;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidoslinea
 * 
 */
class Pedidoslinea
{
     /**
     * var integer
     */
    private $id;
    /**
     * @var integer
     */
    private $codfamilia;

    /**
     * @var Articulos
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
    
      public function addCodpedido(Pedidos $pedido)
    {
        //$this->codpedido[] = $pedido;
        if (!$this->codpedido->contains($pedido)) {
        $this->codpedido->add($pedido);
        }
        return $this;
    }
    /**
     * Set codfamilia
     *
     * @param integer $codfamilia
     * @return Pedidoslinea
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
     * @param Articulos $codigo
     * @return Pedidoslinea
     */
    public function setCodigo(Articulos $codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return Articulos
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set cantidad
     *
     * @param float $cantidad
     * @return Pedidoslinea
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
     * @return Pedidoslinea
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
     * @return Pedidoslinea
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
     * @return Pedidoslinea
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
     * @param \Multiservices\InventarioBundle\Entity\Pedidos $pedidoArticulos
     * @return Pedidoslinea
     */
    public function setCodpedido(\Multiservices\InventarioBundle\Entity\Pedidos $codpedido)
    {
        $this->codpedido = $codpedido;
        return $this;
    }

    /**
     * Get codpedido
     *
     * @return \Multiservices\InventarioBundle\Entity\Pedidos
     */
    public function getCodpedido()
    {
        return $this->codpedido;
    }

    /**
     * Set numlinea
     *
     * @param integer $numlinea
     * @return Pedidoslinea
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
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    public function __toString() {
    return strval($this->getCodigo());
    }
}
