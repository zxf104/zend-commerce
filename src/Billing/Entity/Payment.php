<?php

namespace ZendCommerce\Billing\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="pagamento")
 */
class Payment{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $valueReceived;

    /**
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    protected $receiveDate;




}

?>