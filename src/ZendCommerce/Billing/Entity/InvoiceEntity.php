<?php

namespace ZendCommerce\Billing\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZendCommerce\Billing\Model\Money;
use ZendCommerce\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoice")
 */
class InvoiceEntity extends BaseEntity{

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

        $this->history = new ArrayCollection();
    }

    public function setAddress($ad){
        $this->address = $ad;
    }

    public function setPayment($payment){
        $this->payment = $payment;
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

    public function setInvoiceLines(ArrayCollection $collection){
        $this->invoiceLines = $collection;
    }

    public function getPrice(){
        $price = Money::BRL(0);

        foreach ($this->invoiceLines as $il){
            $price = $price->add($il->getValue()->multiply($il->getQuantity()));
        }

        return $price;
    }

    public function setPerson($person){
        $this->person = $person;
    }



}

?>