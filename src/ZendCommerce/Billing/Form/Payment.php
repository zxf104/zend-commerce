<?php
/**
 * Created by PhpStorm.
 * User: R2D2
 * Date: 11/4/13
 * Time: 3:03 PM
 */

namespace ZendCommerce\Billing\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;
use Zend\Form\Element;
use ZendCommerce\Billing\Form\Fieldset\Payment as PaymentFieldset;

class Payment{

    public function __construct($objectManager){
        $this->objectManager = $objectManager();
    }

    public function init(){

        $this->setAttribute('class', 'form-horizontal col-lg-6 col-md-8 col-xs-12 col-sm-10');

        $this->setAttribute('action', '#payment-form');

        $objectManager = $this->getObjectManager();
        parent::__construct('payment-form');
        $this->setHydrator(new DoctrineHydrator($objectManager));
        // Add the user fieldset, and set it as the base fieldset
        $mpFieldset = new PaymentFieldset($objectManager);
        $mpFieldset->setUseAsBaseFieldset(true);
        $this->add($mpFieldset);
        $this->add(new Element\Csrf('security'));
    }

} 