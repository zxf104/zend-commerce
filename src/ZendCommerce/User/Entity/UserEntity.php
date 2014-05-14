<?php

namespace ZendCommerce\User\Entity;

use ZfcUserDoctrineORM\Entity\User as UserBaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZendCommerce\User\Model\UserInterface;

/**
 * Class User
 * @package User\Entity
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class UserEntity extends UserBaseEntity implements UserInterface{


    /** @ORM\Embedded(class="Address") */
    protected $address;

    /**
     * @ORM\Embedded(class="Person")
     *
     */
    protected $person;

    public function getAddress(){
        return $this->address;
    }

    public function getPerson(){
        return $this->person;
    }

}

?>