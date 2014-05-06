<?php

namespace ZendCommerce\Common\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Common\Model\PersonInterface;
/**
 * @ORM\Embeddable
 */
class PersonEntity extends BaseEmbeddable implements PersonInterface{

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


}