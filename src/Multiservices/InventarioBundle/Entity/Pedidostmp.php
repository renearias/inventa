<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidostmp
 */
class Pedidostmp
{
    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var integer
     */
    private $codpedido;


    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Pedidostmp
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
     * Get codpedido
     *
     * @return integer 
     */
    public function getCodpedido()
    {
        return $this->codpedido;
    }
}
