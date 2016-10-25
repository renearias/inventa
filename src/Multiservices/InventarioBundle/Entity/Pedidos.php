<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
/**
 * Pedidos
 */
class Pedidos
{
    /**
     * @var integer
     */
    private $codfactura;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var boolean
     */
    private $iva;

    /**
     * @var integer
     */
    private $codcliente;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var float
     */
    private $totalpedido;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var integer
     */
    private $codpedido;

    private $pedido_articulos;
    
    public function __construct()
    {
    $this->pedido_articulos = new \Doctrine\Common\Collections\ArrayCollection();
    $this->fecha = new \DateTime();
    }
    
    
    
    /**
     * Set codfactura
     *
     * @param integer $codfactura
     * @return Pedidos
     */
    public function setCodfactura($codfactura)
    {
        $this->codfactura = $codfactura;

        return $this;
    }

    /**
     * Get codfactura
     *
     * @return integer 
     */
    public function getCodfactura()
    {
        return $this->codfactura;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Pedidos
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
     * Set iva
     *
     * @param boolean $iva
     * @return Pedidos
     */
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return boolean 
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set codcliente
     *
     * @param integer $codcliente
     * @return Pedidos
     */
    public function setCodcliente($codcliente)
    {
        $this->codcliente = $codcliente;

        return $this;
    }

    /**
     * Get codcliente
     *
     * @return integer 
     */
    public function getCodcliente()
    {
        return $this->codcliente;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Pedidos
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
     * Set totalpedido
     *
     * @param float $totalpedido
     * @return Pedidos
     */
    public function setTotalpedido($totalpedido)
    {
        $this->totalpedido = $totalpedido;

        return $this;
    }

    /**
     * Get totalpedido
     *
     * @return float 
     */
    public function getTotalpedido()
    {
        return $this->totalpedido;
    }

    /**
     * Set borrado
     *
     * @param string $borrado
     * @return Pedidos
     */
    public function setBorrado($borrado)
    {
        $this->borrado = $borrado;

        return $this;
    }

    /**
     * Get borrado
     *
     * @return string 
     */
    public function getBorrado()
    {
        return $this->borrado;
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
     public function setPedidoArticulos(\Doctrine\Common\Collections\Collection $articulos)
    {
        
    $this->pedido_articulos = $articulos;
         foreach ($articulos as $articulo) {
            $articulo->setCodpedido($this);
        }
    }
    
    /*public function doPostArticulos(\Doctrine\ORM\Event\PreFlushEventArgs $args)
    {
      $articulos=$this->pedido_articulos;
       foreach ($articulos as $articulo) {
           $articulo->setCodpedido($this);
          // var_dump($articulo);
        }
    }*/
    /**
    * Get pedido_articulos
    * @inheritDoc
    * @return Doctrine\Common\Collections\Collection
    */
    public function getPedidoArticulos()
    {
    return $this->pedido_articulos->toArray();
    }

    
    /**
     * Add pedido_articulos
     * ORM/PostPersist
     * ORM/PostUpdate
     * @param \Multiservices\InventarioBundle\Entity\Pedidoslinea $pedidoArticulos
     * @return Pedidos
     * 
     */
    public function addPedidoArticulo(\Multiservices\InventarioBundle\Entity\Pedidoslinea $pedidoArticulos)
    {


        $this->pedido_articulos[] = $pedidoArticulos;
        
        //$tag->addTask($this);
        return $this;
    }

    /**
     * Remove pedido_articulos
     *
     * @param \Multiservices\InventarioBundle\Entity\Pedidoslinea $pedidoArticulos
     */
    public function removePedidoArticulo(\Multiservices\InventarioBundle\Entity\Pedidoslinea $pedidoArticulos)
    {
        $this->pedido_articulos->removeElement($pedidoArticulos);
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->codpedido;
    }
    public function __toString() {
    return strval($this->getCodpedido());
    }
}
