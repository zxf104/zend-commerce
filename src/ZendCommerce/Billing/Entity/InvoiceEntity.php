<?php

namespace ZendCommerce\Billing\Entity;

use ZendCommerce\Billing\Model\InvoiceInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZendCommerce\Billing\Model\Money;
use ZendCommerce\Common\Entity\BaseEntity;


/**
 * @ORM\Entity
 * @ORM\Table(name="invoice")
 * @ORM\Repository(class = "ZendCommerce\Billing\Repository\InvoiceRepository")
 */
class InvoiceEntity extends BaseEntity implements InvoiceInterface{

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
     * @ORM\Embedded(class = "ZendCommerce\User\Entity\Addressable")
     */
    protected $address;

    /**
     * @ORM\Embedded(class = "ZendCommerce\Billing\Entity\EmbeddedPayment")
     */
    protected $payment;

    /**
     * @ORM\Embedded(class = "ZendCommerce\Billing\Entity\EmbeddedPerson")
     */
    protected $person;

    public function __construct(){

        parent::__construct();
        $this->history = new ArrayCollection();
    }


    /**
     * @param AddressInterface : $ad
     * @return $this
     */
    public function setAddress($ad){
        $this->address = $ad;
        return $this;
    }

    /**
     * @param PaymentInterface $payment
     * @return $this
     */
    public function setPayment($payment){
        $this->payment = $payment;
        return $this;
    }

    public function getPayment(){
        return $this->payment;
    }

    public function addHistoryEntries($collection){
        foreach ($collection as $element){
            $this->history->add($element);
        }
        return $this;
    }

    public function addHistoryEntry(HistoryEntry $he){
        $this->history->add($he);
        return $this;
    }

    public function removeHistoryEntry($index){
        $this->history->offsetUnset($index);
    }

    public function clearHistoryEntry(){
        $this->history->clear();
    }

    public function getMoney(){
        $price = Money::BRL(0);

        foreach ($this->invoiceLines as $il){
            $price = $price->add($il->getValue()->multiply($il->getQuantity()));
        }

        return $price;
    }

    public function setPerson($person){
        $this->person = $person;
    }

    public function getPerson(){
        return $this->getPerson();
    }

    public function addInvoiceLines($collection){
        foreach ($collection as $element){
            $this->invoiceLines->add($element);
        }
        return $this;
    }

    public function addInvoiceLine($element){
        $this->invoiceLines->add($element);

    }

    public function removeInvoiceLine($index){
        return $this->history->offsetUnset($index);
    }

    public function getInvoiceLines(){
        return $this->getInvoiceLines();
    }
}

?>