<?php

namespace ZendCommerce\Billing\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoice")
 */
class Invoice{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;


    /**
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    protected $date_created;

    /**
     * @var \ZendCommerce\Billing\Entity\Payment
     * @ORM\ManyToOne(targetEntity="Payment")
     */
    protected $pagamento;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="InvoiceLine", mappedBy="invoice")
     */
    protected $invoiceLines;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="HistoryEntry", mappedBy="invoice")
     */
    protected $history;

    /**
     * @ORM\Embedded(class = "ZendCommerce\Shipping\Entity\Transportable")
     */
    protected $shipping;

    /**
     * @ORM\Embedded(class = "ZendCommerce\User\Entity\Addressable")
     */
    protected $address;

    /**
     * @ORM\Embedded(class = "MoipProvider")
     */
    protected $moip;





}

?>