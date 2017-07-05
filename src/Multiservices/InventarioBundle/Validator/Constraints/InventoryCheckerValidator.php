<?php

namespace Multiservices\InventarioBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Multiservices\InventarioBundle\Entity\Pedidoslinea;

/**
 * Description of InventoryCheckerValidator
 *
 * @author Rene Arias <renearias@arxis.la>
 */
class InventoryCheckerValidator extends ConstraintValidator
{
    
    private function inventoryExistProduct(Pedidoslinea $pedidoLinea){
        $articulo=$pedidoLinea->getCodigo();
        if ($pedidoLinea->getCantidad()<=$articulo->getStock())
        {return true;}
        else
        {return false;}
        return false;
    }
    
    private function allProductsExists($pedidosLineas){
        $articulo=null;
        foreach ($pedidosLineas as $pedidoLinea){
           if (!$this->inventoryExistProduct($pedidoLinea))
           {
               $articulo=$pedidoLinea->getCodigo();
               break;
           }
        }
        return $articulo;
    }
             
    public function validate($value, Constraint $constraint)
    {
        $articulo=$this->allProductsExists($value);
        if ($articulo) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ stock }}', $articulo->getStock())
                ->setParameter('{{ product }}', $articulo->getDescripcion())
                ->addViolation();
        }
    }
}