<?php

namespace ZendCommerce\User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Addressable{

    /**
     * @ORM\Column(type="text")
     */
    protected $zipCode;

    /**
     * @ORM\Column(type="text")
     */
    protected $country;

    /**
     * @ORM\Column(type="text")
     */
    protected $federativeUnit;

    /**
     * @ORM\Column(type="text")
     */
    protected $neighborhood;

    /**
     * @ORM\Column(type="text")
     */
    protected $city;

    /**
     * @ORM\Column(type="text")
     */
    protected $street;

    /**
     * @ORM\Column(type="text")
     */
    protected $number;

    /**
     * @ORM\Column(type="text")
     */
    protected $complement;

}


?>
