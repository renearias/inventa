<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facturasp
 */
class Facturasp
{
    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var boolean
     */
    private $iva;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var float
     */
    private $totalfactura;

    /**
     * @var \DateTime
     */
    private $fechapago;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var string
     */
    private $codfactura;

    /**
     * @var integer
     */
    private $codproveedor;

    private $compra_articulos;
    
    public function __construct()
    {
    $this->compra_articulos = new \Doctrine\Common\Collections\ArrayCollection();
    $this->fecha = new \DateTime();
    $this->fechapago = new \DateTime();
    }
    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Facturasp
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
     * @return Facturasp
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
     * Set estado
     *
     * @param string $estado
     * @return Facturasp
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
     * Set totalfactura
     *
     * @param float $totalfactura
     * @return Facturasp
     */
    public function setTotalfactura($totalfactura)
    {
        $this->totalfactura = $totalfactura;

        return $this;
    }

    /**
     * Get totalfactura
     *
     * @return float 
     */
    public function getTotalfactura()
    {
        return $this->totalfactura;
    }

    /**
     * Set fechapago
     *
     * @param \DateTime $fechapago
     * @return Facturasp
     */
    public function setFechapago($fechapago)
    {
        $this->fechapago = $fechapago;

        return $this;
    }

    /**
     * Get fechapago
     *
     * @return \DateTime 
     */
    public function getFechapago()
    {
        return $this->fechapago;
    }

    /**
     * Set borrado
     *
     * @param string $borrado
     * @return Facturasp
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
     * Set codfactura
     *
     * @param string $codfactura
     * @return Facturasp
     */
    public function setCodfactura($codfactura)
    {
        $this->codfactura = $codfactura;

        return $this;
    }

    /**
     * Get codfactura
     *
     * @return string 
     */
    public function getCodfactura()
    {
        return $this->codfactura;
    }

    /**
     * Set codproveedor
     *
     * @param integer $codproveedor
     * @return Facturasp
     */
    public function setCodproveedor($codproveedor)
    {
        $this->codproveedor = $codproveedor;

        return $this;
    }

    /**
     * Get codproveedor
     *
     * @return integer 
     */
    public function getCodproveedor()
    {
        return $this->codproveedor;
    }
    
     public function setCompraArticulos(\Doctrine\Common\Collections\Collection $articulos)
    {
        
    $this->compra_articulos = $articulos;
         foreach ($articulos as $articulo) {
            $articulo->setCodfactura($this);
        }
    }
    
    /**
    * Get compra_articulos
    * @inheritDoc
    * @return Doctrine\Common\Collections\Collection
    */
    public function getCompraArticulos()
    {
    return $this->compra_articulos->toArray();
    }

    
    /**
     * Add compra_articulos
     * ORM/PostPersist
     * ORM/PostUpdate
     * @param \Multiservices\InventarioBundle\Entity\Factulineap $compraArticulos
     * @return Compras
     * 
     */
    public function addCompraArticulo(\Multiservices\InventarioBundle\Entity\Factulineap $compraArticulos)
    {


        $this->compra_articulos[] = $compraArticulos;
        return $this;
    }

    /**
     * Remove compra_articulos
     *
     * @param \Multiservices\InventarioBundle\Entity\Factulineap $compraArticulos
     */
    public function removeCompraArticulo(\Multiservices\InventarioBundle\Entity\Factulineap $compraArticulos)
    {
        $this->compra_articulos->removeElement($compraArticulos);
    }
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->codfactura;
    }
    public function __toString() {
    return $this->getCodfactura();
    }
}
