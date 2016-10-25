<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atributos
 */
class Atributos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $atributo;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set atributo
     *
     * @param string $atributo
     * @return Atributos
     */
    public function setAtributo($atributo)
    {
        $this->atributo = $atributo;

        return $this;
    }

    /**
     * Get atributo
     *
     * @return string 
     */
    public function getAtributo()
    {
        return $this->atributo;
    }
    public function __toString()
    {
    return $this->getAtributo();
    }
}
