<?php

namespace ZendCommerceTest\Common;

use PHPUnit_Framework_TestCase as TestCase;
use ZendCommerce\Common\Model\FormOperation;
use ZendCommerce\Common\Service\FormManager;

class FormManagerTest extends TestCase{

    protected $formManager;

    protected $formOperation;

    protected $formOperationConfig = array();

    protected $fakePost = array();


    public function setUp(){

        $sm = \ZendCommerceTest\Util\ServiceManagerFactory::getServiceManager();
        $this->formManager = new FormManager($sm->get('doctrine.entitymanager.orm_default'));
        $this->formOperantion = new FormOperation($this->formOperationConfig);


    }

    public function testProcessAutomatedForm(){

        $this->formManager->process($this->fakePost, $this->formOperation);

    }

}