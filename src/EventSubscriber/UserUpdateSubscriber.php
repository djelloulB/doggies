<?php

namespace App\EventSubscriber;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserUpdateSubscriber implements EventSubscriberInterface
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder){
        $this->encoder =$encoder;
    }

    /**
     * @param BeforeEntityPersistedEvent ou BeforeEntityUpdatedEvent  $event
     */
    public function onBeforeEntityPersistedEvent($event)
    {
        $user = $event->getEntityInstance();
        if (!$user instanceof Utilisateur){
            return;
        }


        if(empty($user->getPlainPassword())){
            return;
        }
        //sinon encoder le mot de passe
        $newPwd = $this->encoder->hashPassword($user, $user->getPlainPassword());
        $user->setMotDePasse($newPwd);
    }


    /**
     * @return string[]
     */
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
            BeforeEntityUpdatedEvent::class => 'onBeforeEntityPersistedEvent',
        ];
    }
}
