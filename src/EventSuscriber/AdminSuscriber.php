<?php

namespace App\EventSuscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSuscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return[
            BeforeEntityPersistedEvent::class=>['set']
        ]
    }

    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event)
    {
        $entity =
    }
}