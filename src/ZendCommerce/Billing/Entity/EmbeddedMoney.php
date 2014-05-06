<?php
namespace ZendCommerce\Billing\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Billing\Model\Money;

/**
 * @ORM\Embeddable
 */
class EmbeddedMoney extends Money{

    /**
     * @var int
     * @ORM\Column(type="text")
     */
    private $amount;

    /**
     * @var \Money\Currency
     * @ORM\Column(type="text")
     */
    private $currency;

}


?>