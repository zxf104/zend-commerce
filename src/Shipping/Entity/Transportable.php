<?php

namespace ZendCommerce\Shipping\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Embeddable
 */
class Transportable{

    /**
     * @ORM\Column(type="text")
     */
    protected $serviceCode;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $homeDelivery;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $deliverySaturday;

    /**
     * @ORM\Column(type="text")
     */
    protected $quantiaStringRepresentation;

    /**
     * @ORM\Column(type="integer")
     */
    protected $deliveryPeriod;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $trackingNumber;
}


?>