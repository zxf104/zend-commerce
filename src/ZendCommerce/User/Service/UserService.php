<?php

namespace ZendCommerce\User\Service;

use ZendCommerce\Common\Event\FormEvent;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class UserService implements UserServiceInterface{

    protected $authAdapter;

    protected $entityManager;


    public function __construct($authAdapter, $entityManager){

        $this->authAdapter = $authAdapter;
        $this->entityManager = $entityManager;

    }

    public function getIdentity(){
        return $this->authAdapter->getIdentity();
    }

    public function getEditFormEvent($id, $data){
        if (!$this->formEvent){
            $event = new FormEvent();
            $event
                ->setForm('ZendCommerce\User\Form\UserForm')
                ->setTemplate('user/edit')
                ->setEntity('ZendCommerce\User\Entity\UserEntity')
                ->setHydrator(new DoctrineHydrator($this->entityManager))
                ->setPostData($data)
                ->setEntityId($id);

            $this->formEvent = $event;
        }
    }
}