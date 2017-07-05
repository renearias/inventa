<?php

namespace Multiservices\InventarioBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Description of InventoryChecker
 *
 * @author Rene Arias <renearias@arxis.la>
 * @Annotation
 */
class InventoryChecker extends Constraint
{
    public $message = 'Solo quedan "{{ stock }}" unidades de el artículo "{{ product }}".';
    
}