<?php
namespace ZendCommerce\Billing\Repository;

use Doctrine\ORM\EntityRepository as DoctrineRepository;
use ZendCommerce\Billing\Entity\InvoiceEntity;

class InvoiceRepository extends DoctrineRepository{

    /**
     * @param mixed $id
     * @return null|InvoiceEntity
     */
    public function find($id){
        return parent::find($id);
    }

}