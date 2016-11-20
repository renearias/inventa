<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Embalajes
 */
class Embalajes
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $borrado=0;

    /**
     * @var integer
     */
    private $codembalaje;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Embalajes
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
     * @return Embalajes
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
     * Get codembalaje
     *
     * @return integer 
     */
    public function getCodembalaje()
    {
        return $this->codembalaje;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
       return $this->codembalaje;
    }
    
    public function __toString() {
        return $this->nombre;
    }
}
