<?php

namespace Multiservices\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Librodiario
 */
class Librodiario
{
    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $tipodocumento;

    /**
     * @var string
     */
    private $coddocumento;

    /**
     * @var integer
     */
    private $codcomercial;

    /**
     * @var integer
     */
    private $codformapago;

    /**
     * @var string
     */
    private $numpago;

    /**
     * @var float
     */
    private $total;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Librodiario
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
     * Set tipodocumento
     *
     * @param string $tipodocumento
     * @return Librodiario
     */
    public function setTipodocumento($tipodocumento)
    {
        $this->tipodocumento = $tipodocumento;

        return $this;
    }

    /**
     * Get tipodocumento
     *
     * @return string 
     */
    public function getTipodocumento()
    {
        return $this->tipodocumento;
    }

    /**
     * Set coddocumento
     *
     * @param string $coddocumento
     * @return Librodiario
     */
    public function setCoddocumento($coddocumento)
    {
        $this->coddocumento = $coddocumento;

        return $this;
    }

    /**
     * Get coddocumento
     *
     * @return string 
     */
    public function getCoddocumento()
    {
        return $this->coddocumento;
    }

    /**
     * Set codcomercial
     *
     * @param integer $codcomercial
     * @return Librodiario
     */
    public function setCodcomercial($codcomercial)
    {
        $this->codcomercial = $codcomercial;

        return $this;
    }

    /**
     * Get codcomercial
     *
     * @return integer 
     */
    public function getCodcomercial()
    {
        return $this->codcomercial;
    }

    /**
     * Set codformapago
     *
     * @param integer $codformapago
     * @return Librodiario
     */
    public function setCodformapago($codformapago)
    {
        $this->codformapago = $codformapago;

        return $this;
    }

    /**
     * Get codformapago
     *
     * @return integer 
     */
    public function getCodformapago()
    {
        return $this->codformapago;
    }

    /**
     * Set numpago
     *
     * @param string $numpago
     * @return Librodiario
     */
    public function setNumpago($numpago)
    {
        $this->numpago = $numpago;

        return $this;
    }

    /**
     * Get numpago
     *
     * @return string 
     */
    public function getNumpago()
    {
        return $this->numpago;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Librodiario
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
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
}
