<?php

namespace App\EventSuscriber;

use App\Model\TimeStampedInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSuscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return[
            BeforeEntityPersistedEvent::class=>['setEntityCreatedAt'],
            BeforeEntityUpdatedEvent::class=>['setEntityUpdatedAt']
        ];
    }

    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event): void
    {
        $entity= $event->getEntityInstance();

        if(!$entity instanceof TimeStampedInterface){
            return;
        }

        $entity->setCreatedAt(new \DateTime());
    }
    public function setEntityUpdatedAt(BeforeEntityUpdatedEvent $event):void
    {
        $entity= $event->getEntityInstance();

        if(!$entity instanceof TimeStampedInterface){
            return;
        }

        $entity->setUpdatedAt(new \DateTime());
    }
}