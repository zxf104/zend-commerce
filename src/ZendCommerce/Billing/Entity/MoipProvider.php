<?php

namespace ZendCommerce\Billing\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class MoipProvider{

    /**
     * @ORM\Column(type="text")
     */
    protected $token;
}

?>