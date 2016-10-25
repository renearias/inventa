<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Impuestos
 */
class Impuestos
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var integer
     */
    private $codimpuesto;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Impuestos
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
     * Set valor
     *
     * @param float $valor
     * @return Impuestos
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set borrado
     *
     * @param string $borrado
     * @return Impuestos
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
     * Get codimpuesto
     *
     * @return integer 
     */
    public function getCodimpuesto()
    {
        return $this->codimpuesto;
    }
}
