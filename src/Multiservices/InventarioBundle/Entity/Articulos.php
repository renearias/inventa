<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articulos
 */
class Articulos
{
    /**
     * @var integer
     */
    private $codfamilia;

    /**
     * @var string
     */
    private $referencia;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var float
     */
    private $impuesto;

    /**
     * @var integer
     */
    private $codproveedor1;

    /**
     * @var integer
     */
    private $codproveedor2;

    /**
     * @var string
     */
    private $descripcionCorta;

    /**
     * @var integer
     */
    private $codubicacion;

    /**
     * @var integer
     */
    private $stock;

    /**
     * @var integer
     */
    private $stockMinimo;

    /**
     * @var string
     */
    private $avisoMinimo;

    /**
     * @var string
     */
    private $datosProducto;

    /**
     * @var \DateTime
     */
    private $fechaAlta;

    /**
     * @var integer
     */
    private $codembalaje;

    /**
     * @var integer
     */
    private $unidadesCaja;

    /**
     * @var string
     */
    private $precioTicket;

    /**
     * @var string
     */
    private $modificarTicket;

    /**
     * @var string
     */
    private $observaciones;

    /**
     * @var float
     */
    private $precioCompra;

    /**
     * @var float
     */
    private $precioAlmacen;

    /**
     * @var float
     */
    private $precioTienda;

    /**
     * @var float
     */
    private $precioPvp;

    /**
     * @var float
     */
    private $precioIva;

    /**
     * @var string
     */
    private $codigobarras;

    /**
     * @var string
     */
    private $imagen;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var integer
     */
    private $codarticulo;
    
    private $articulosdetail;
    
    private $atributos;

 public function __construct() {
     $this->codfamilia = new \Doctrine\Common\Collections\ArrayCollection();
     $this->articulosdetail = new \Doctrine\Common\Collections\ArrayCollection();
     $this->atributos = new \Doctrine\Common\Collections\ArrayCollection();
     $this->fechaAlta = new \DateTime();
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
 
    public function setAtributos($atributos) {
    $this->atributos = $atributos;
    }
    /**
    * Get atributos
    *
    * @return Doctrine\Common\Collections\Collection
    */
    public function getarticuloatributos()
    {
    return $this->atributos;
    }
    /**
    * Get atributos
    * @inheritDoc
    * @return Doctrine\Common\Collections\Collection
    */
    public function getAtributos()
    {
        //return array('Atributo_articulo');
        return $this->atributos->toArray();    //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }
    
    /**
     * Add atributos
     *
     * @param \Multiservices\InventarioBundle\Entity\Atributos $articuloatributos
     * @return articulo
     */
    public function addAtributo(\Multiservices\InventarioBundle\Entity\Atributos $articuloatributos)
    {
        $this->atributos[] = $articuloatributos;

        return $this;
    }

    /**
     * Remove atributos
     *
     * @param \Multiservices\InventarioBundle\Entity\Atributos $articuloatributos
     */
    public function removeAtributo(\Multiservices\InventarioBundle\Entity\Atributos $articuloatributos)
    {
        $this->atributos->removeElement($articuloatributos);
    }
 
 
 
    /**
     * Set codfamilia
     *
     * @param \Multiservices\InventarioBundle\Entity\Familias $codfamilia
     * @return Articulos
     */
    public function setCodfamilia($codfamilia)
    {
        $this->codfamilia = $codfamilia;

        return $this;
    }

    /**
     * Get codfamilia
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getCodfamilia()
    {
        return $this->codfamilia;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     * @return Articulos
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Articulos
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
     * Set impuesto
     *
     * @param float $impuesto
     * @return Articulos
     */
    public function setImpuesto($impuesto)
    {
        $this->impuesto = $impuesto;

        return $this;
    }

    /**
     * Get impuesto
     *
     * @return float 
     */
    public function getImpuesto()
    {
        return $this->impuesto;
    }

    /**
     * Set codproveedor1
     *
     * @param integer $codproveedor1
     * @return Articulos
     */
    public function setCodproveedor1($codproveedor1)
    {
        $this->codproveedor1 = $codproveedor1;

        return $this;
    }

    /**
     * Get codproveedor1
     *
     * @return integer 
     */
    public function getCodproveedor1()
    {
        return $this->codproveedor1;
    }

    /**
     * Set codproveedor2
     *
     * @param integer $codproveedor2
     * @return Articulos
     */
    public function setCodproveedor2($codproveedor2)
    {
        $this->codproveedor2 = $codproveedor2;

        return $this;
    }

    /**
     * Get codproveedor2
     *
     * @return integer 
     */
    public function getCodproveedor2()
    {
        return $this->codproveedor2;
    }

    /**
     * Set descripcionCorta
     *
     * @param string $descripcionCorta
     * @return Articulos
     */
    public function setDescripcionCorta($descripcionCorta)
    {
        $this->descripcionCorta = $descripcionCorta;

        return $this;
    }

    /**
     * Get descripcionCorta
     *
     * @return string 
     */
    public function getDescripcionCorta()
    {
        return $this->descripcionCorta;
    }

    /**
     * Set codubicacion
     *
     * @param integer $codubicacion
     * @return Articulos
     */
    public function setCodubicacion($codubicacion)
    {
        $this->codubicacion = $codubicacion;

        return $this;
    }

    /**
     * Get codubicacion
     *
     * @return integer 
     */
    public function getCodubicacion()
    {
        return $this->codubicacion;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Articulos
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set stockMinimo
     *
     * @param integer $stockMinimo
     * @return Articulos
     */
    public function setStockMinimo($stockMinimo)
    {
        $this->stockMinimo = $stockMinimo;

        return $this;
    }

    /**
     * Get stockMinimo
     *
     * @return integer 
     */
    public function getStockMinimo()
    {
        return $this->stockMinimo;
    }

    /**
     * Set avisoMinimo
     *
     * @param string $avisoMinimo
     * @return Articulos
     */
    public function setAvisoMinimo($avisoMinimo)
    {
        $this->avisoMinimo = $avisoMinimo;

        return $this;
    }

    /**
     * Get avisoMinimo
     *
     * @return string 
     */
    public function getAvisoMinimo()
    {
        return $this->avisoMinimo;
    }

    /**
     * Set datosProducto
     *
     * @param string $datosProducto
     * @return Articulos
     */
    public function setDatosProducto($datosProducto)
    {
        $this->datosProducto = $datosProducto;

        return $this;
    }

    /**
     * Get datosProducto
     *
     * @return string 
     */
    public function getDatosProducto()
    {
        return $this->datosProducto;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Articulos
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set codembalaje
     *
     * @param integer $codembalaje
     * @return Articulos
     */
    public function setCodembalaje($codembalaje)
    {
        $this->codembalaje = $codembalaje;

        return $this;
    }

    /**
     * Get codembalaje
     *
     * @return integer 
     */
    public function getCodembalaje()
    {
        return $this->codembalaje;
    }

    /**
     * Set unidadesCaja
     *
     * @param integer $unidadesCaja
     * @return Articulos
     */
    public function setUnidadesCaja($unidadesCaja)
    {
        $this->unidadesCaja = $unidadesCaja;

        return $this;
    }

    /**
     * Get unidadesCaja
     *
     * @return integer 
     */
    public function getUnidadesCaja()
    {
        return $this->unidadesCaja;
    }

    /**
     * Set precioTicket
     *
     * @param string $precioTicket
     * @return Articulos
     */
    public function setPrecioTicket($precioTicket)
    {
        $this->precioTicket = $precioTicket;

        return $this;
    }

    /**
     * Get precioTicket
     *
     * @return string 
     */
    public function getPrecioTicket()
    {
        return $this->precioTicket;
    }

    /**
     * Set modificarTicket
     *
     * @param string $modificarTicket
     * @return Articulos
     */
    public function setModificarTicket($modificarTicket)
    {
        $this->modificarTicket = $modificarTicket;

        return $this;
    }

    /**
     * Get modificarTicket
     *
     * @return string 
     */
    public function getModificarTicket()
    {
        return $this->modificarTicket;
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
     * Set precioCompra
     *
     * @param float $precioCompra
     * @return Articulos
     */
    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;

        return $this;
    }

    /**
     * Get precioCompra
     *
     * @return float 
     */
    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }

    /**
     * Set precioAlmacen
     *
     * @param float $precioAlmacen
     * @return Articulos
     */
    public function setPrecioAlmacen($precioAlmacen)
    {
        $this->precioAlmacen = $precioAlmacen;

        return $this;
    }

    /**
     * Get precioAlmacen
     *
     * @return float 
     */
    public function getPrecioAlmacen()
    {
        return $this->precioAlmacen;
    }

    /**
     * Set precioTienda
     *
     * @param float $precioTienda
     * @return Articulos
     */
    public function setPrecioTienda($precioTienda)
    {
        $this->precioTienda = $precioTienda;

        return $this;
    }

    /**
     * Get precioTienda
     *
     * @return float 
     */
    public function getPrecioTienda()
    {
        return $this->precioTienda;
    }

    /**
     * Set precioPvp
     *
     * @param float $precioPvp
     * @return Articulos
     */
    public function setPrecioPvp($precioPvp)
    {
        $this->precioPvp = $precioPvp;

        return $this;
    }

    /**
     * Get precioPvp
     *
     * @return float 
     */
    public function getPrecioPvp()
    {
        return $this->precioPvp;
    }

    /**
     * Set precioIva
     *
     * @param float $precioIva
     * @return Articulos
     */
    public function setPrecioIva($precioIva)
    {
        $this->precioIva = $precioIva;

        return $this;
    }

    /**
     * Get precioIva
     *
     * @return float 
     */
    public function getPrecioIva()
    {
        return $this->precioIva;
    }

    /**
     * Set codigobarras
     *
     * @param string $codigobarras
     * @return Articulos
     */
    public function setCodigobarras($codigobarras)
    {
        $this->codigobarras = $codigobarras;

        return $this;
    }

    /**
     * Get codigobarras
     *
     * @return string 
     */
    public function getCodigobarras()
    {
        return $this->codigobarras;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return Articulos
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set borrado
     *
     * @param string $borrado
     * @return Articulos
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
     * Get codarticulo
     *
     * @return integer 
     */
    public function getCodarticulo()
    {
        return $this->codarticulo;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->codarticulo;
    }
    public function __toString()
    {
    return $this->getDescripcion()." - ".$this->getCodubicacion() ;
    }
}
