<?php

namespace ZendCommerce\User\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Common\BaseEmbeddable;
use ZendCommerce\Common\Model\AddressInterface;

/**
 * @ORM\Embeddable
 */
class AddressEmbeddable extends BaseEmbeddable implements AddressInterface{

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

    public function isValid(){

    }



}


?>
