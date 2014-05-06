<?php

namespace ZendCommerce\Billing\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZendCommerce\Common\DevMagic;

/**
 * @ORM\Embeddable
 */
class EmbeddedPayment{

    use DevMagic;

    const METHOD_CC = 'metodo_moip';
    const METHOD_BILLET = 'metodo_billet';
    const METHOD_WIRE = 'metodo_wire';

    /**
     * @ORM\Column(type="text")
     */
    protected $method;

    /**
     * @ORM\Column(type="text")
     */
    protected $gatewayToken;

    /**
     * @ORM\Column(type="text")
     */
    protected $valueReceived;

    /**
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    protected $receiveDate;

    /**
     * @var InvoiceEntity
     */
    protected $invoice;
}

?>