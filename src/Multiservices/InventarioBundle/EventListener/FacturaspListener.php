<?php

namespace Multiservices\InventarioBundle\EventListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

use Multiservices\InventarioBundle\Entity\Facturasp;

class FacturaspListener
{
    /** @PrePersist */
    public function prePersistHandler(Facturasp $facturap, LifecycleEventArgs $event) { 

        }
    /** @PostPersist */
    public function postPersistHandler(Facturasp $facturap, LifecycleEventArgs $event) {
    
        
        
    }

    /** @PreUpdate */
    public function preUpdateHandler(Facturasp $facturap, PreUpdateEventArgs $event) { }

    /** @PostUpdate */
    public function postUpdateHandler(Facturasp $facturap, LifecycleEventArgs $event) {}

    /** @PostRemove */
    public function postRemoveHandler(Facturasp $facturap, LifecycleEventArgs $event) { }

    /** @PreRemove */
    public function preRemoveHandler(Facturasp $facturap, LifecycleEventArgs $event) {}

    /** @PreFlush */
    public function preFlushHandler(Facturasp $facturap, PreFlushEventArgs $event) {
        $articulos=$facturap->getCompraArticulos();
       foreach ($articulos as $compraarticulo) {
           $compraarticulo->setCodfactura($facturap);
           $compraarticulo->setCodproveedor($facturap->getCodproveedor());
        
           
        }
    }

    /** @PostLoad */
    public function postLoadHandler(Facturasp $facturasp, LifecycleEventArgs $event) {}
}
