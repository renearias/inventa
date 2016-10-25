<?php

namespace Multiservices\InventarioBundle\EventListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

use Multiservices\InventarioBundle\Entity\Factulineap;

class FactulineapListener
{
    /** @PrePersist */
    public function prePersistHandler(Factulineap $factulineap, LifecycleEventArgs $event) { 

        }
    /** @PostPersist */
    public function postPersistHandler(Factulineap $factulineap, LifecycleEventArgs $event) {
    
        
        
    }

    /** @PreUpdate */
    public function preUpdateHandler(Factulineap $factulineap, PreUpdateEventArgs $event) { }

    /** @PostUpdate */
    public function postUpdateHandler(Factulineap $factulineap, LifecycleEventArgs $event) {}

    /** @PostRemove */
    public function postRemoveHandler(Factulineap $factulineap, LifecycleEventArgs $event) { }

    /** @PreRemove */
    public function preRemoveHandler(Factulineap $factulineap, LifecycleEventArgs $event) {}

    /** @PreFlush */
    public function preFlushHandler(Factulineap $factulineap, PreFlushEventArgs $event) {
        $articulosdetail=$factulineap->getArticulosdetail();
     
       foreach ($articulosdetail as $articulounico) {
           $articulounico->setFactulinea($factulineap);
     
           
        }
    }

    /** @PostLoad */
    public function postLoadHandler(Factulineap $factulineap, LifecycleEventArgs $event) {}
}
