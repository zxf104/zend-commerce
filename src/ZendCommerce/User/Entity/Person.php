<?php

namespace ZendCommerce\User\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Common\BaseEmbeddable;
/**
 * @ORM\Embeddable
 */
class Person extends BaseEmbeddable{

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
    protected $birthday;

    public function isValid(){

    }
}