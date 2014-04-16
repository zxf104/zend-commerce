<?php

namespace ZendCommerce\Billing\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoiceline")
 */
class InvoiceLine{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\Embedded(class="ZendCommerce\Billing\Entity\EmbeddedMoney")
     */
    protected $value;

    /**
     * @var \ZendCommerce\Licensing\Entity\EmbeddedLicence
     * @ORM\Embedded(class="Billing\Entity\EmbeddedLicence")
     */
    protected $licencia;

    /**
     * @var ArrayCollection
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="invoiceLines")
     */
    protected $invoice;


}

?>