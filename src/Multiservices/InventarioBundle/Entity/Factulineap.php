<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factulineap
 */
class Factulineap
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
     * @var string
     */
    private $codfactura;

    /**
     * @var integer
     */
    private $codproveedor;

    /**
     * @var integer
     */
    private $numlinea;
    
    private $articulosdetail;

public function __construct() {
     $this->articulosdetail = new \Doctrine\Common\Collections\ArrayCollection();
 }

public function setArticulosdetail($articulosdetail) {
    $this->articulosdetail = $articulosdetail;
    }
    /**
    * Get articulosdetail
    * @inheritDoc
    * @return Doctrine\Common\Collections\Collection
    */
    public function getArticulosdetail()
    {
        //return array('Articulosdetail_articulo');
        return $this->articulosdetail->toArray();    //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }
    
    /**
     * Add articulosdetail
     *
     * @param \Multiservices\InventarioBundle\Entity\ArticulosDetalle $articulodetail
     * @return articulo
     */
    public function addArticulosdetail(\Multiservices\InventarioBundle\Entity\ArticulosDetalle $articulodetail)
    {
        $this->articulosdetail[] = $articulodetail;

        return $this;
    }

    /**
     * Remove articulosdetail
     *
    * @param \Multiservices\InventarioBundle\Entity\ArticulosDetalle $articulodetail
     */
    public function removeArticulosdetail(\Multiservices\InventarioBundle\Entity\ArticulosDetalle $articulodetail)
    {
        $this->articulosdetail->removeElement($articulodetail);
    }

    public function addCodfacturap(Facturasp $factura)
    {
        //$this->codpedido[] = $pedido;
        if (!$this->codfactura->contains($factura)) {
        $this->codfactura->add($factura);
        }
        return $this;
    }
    /**
     * Set codfamilia
     *
     * @param integer $codfamilia
     * @return Factulineap
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
     * @return Factulineap
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return Articulo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set cantidad
     *
     * @param float $cantidad
     * @return Factulineap
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
     * @return Factulineap
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
     * @return Factulineap
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
     * @return Factulineap
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
     * Set codfactura
     *
     * @param string $codfactura
     * @return Factulineap
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
     * @return Factulineap
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

    /**
     * Set numlinea
     *
     * @param integer $numlinea
     * @return Factulineap
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
    return $this->getCodfactura()." -" .$this->getCodigo(). "-".$this->getId();
    }
}
