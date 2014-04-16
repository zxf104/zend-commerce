<?php
namespace ZendCommerce\Billing\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Billing\Model\Money;

/**
 * @ORM\Embeddable
 */
class EmbeddedMoney{

    /**
     * The string representation of certain ammount of money. Ie: 'BRL:1234' = R$ 12,34
     * @ORM\Column(type="text")
     */
    protected $stringRepresentation;

    protected $object;

    public function setObject(Money $money){

        $amm = $money->getAmount();
        $curr = $money->getCurrency()->getName();

        if ($amm == null || $curr == null){
            throw new \ZendCommerce\Common\Exception\InvalidArgumentException('Current and ammount has to be setted');
        }

        $this->object = $money;

        $this->stringRepresentation = $curr . ':' . $amm;

        return $this;

    }

    public function getObject(){

        if ($this->object == null){
            if ($this->stringRepresentation == null){
                throw new \ZendCommerce\Common\Exception\RunTimeException('Not able to retrieve object. No prior string represetation was set');
            }
        }
    }

}


?>