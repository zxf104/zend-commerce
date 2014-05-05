<?php

namespace ZendCommerce\User\Entity;

use ZfcUserDoctrineORM\Entity\User as UserBaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User
 * @package User\Entity
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class User extends UserBaseEntity{

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $fullName;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $identityNo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $birthday

    public function hasBillingInfo(){

    }

    public function hasAddress(){

    }

}

?>