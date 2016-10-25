<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ubicaciones
 */
class Ubicaciones
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var integer
     */
    private $codubicacion;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Ubicaciones
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
     * Set borrado
     *
     * @param string $borrado
     * @return Ubicaciones
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
     * Get codubicacion
     *
     * @return integer 
     */
    public function getCodubicacion()
    {
        return $this->codubicacion;
    }
}
