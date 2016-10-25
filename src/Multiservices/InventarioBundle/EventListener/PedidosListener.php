<?php

namespace Multiservices\InventarioBundle\EventListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

use Multiservices\InventarioBundle\Entity\Pedidos;

class PedidosListener
{
    /** @PrePersist */
    public function prePersistHandler(Pedidos $pedido, LifecycleEventArgs $event) { 

        }
    /** @PostPersist */
    public function postPersistHandler(Pedidos $pedido, LifecycleEventArgs $event) {
    
        
        
    }

    /** @PreUpdate */
    public function preUpdateHandler(Pedidos $pedido, PreUpdateEventArgs $event) { }

    /** @PostUpdate */
    public function postUpdateHandler(Pedidos $pedido, LifecycleEventArgs $event) {}

    /** @PostRemove */
    public function postRemoveHandler(Pedidos $pedido, LifecycleEventArgs $event) { }

    /** @PreRemove */
    public function preRemoveHandler(Pedidos $pedido, LifecycleEventArgs $event) {}

    /** @PreFlush */
    public function preFlushHandler(Pedidos $pedido, PreFlushEventArgs $event) {
        $articulos=$pedido->getPedidoArticulos();
       // var_dump($articulos);
       foreach ($articulos as $pedidoarticulo) {
           $pedidoarticulo->setCodpedido($pedido);
        }
    }

    /** @PostLoad */
    public function postLoadHandler(Pedidos $pedidos, LifecycleEventArgs $event) {}
}
