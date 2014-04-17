<?php
/*
 *

namespace ZendCommerceTest\Common;

use PHPUnit_Framework_TestCase as TestCase;
use ZendCommerce\Common\Service\FormManager;
use ZendCommerce\Common\Model\FormOperation;

class FormManagerTest extends TestCase{

    protected $formManager;

    protected $formOperation;

    protected $formOperationConfig;

    protected $fakeController;


    public function setUp(){

        $sm = \ZendCommerceTest\Util\ServiceManagerFactory::getServiceManager();
        $em = $sm->get('doctrine.entitymanager.orm_default');
        $this->formOperationConfig = $this->getFormOperationConfig($sm, $em);
        $this->formManager = new FormManager($em);
        $this->formOperation = new FormOperation($this->formOperationConfig);
        $this->fakeController = $this->getMock('ZendCommerceTest\Util\Controller\PageTestController');



        $this->fakeController->expects($this->any())
            ->method('params')
            ->will($this->returnCallback($this->getMock('stdClass')->expects($this->any())
                ->method('isPost')
                ->will($this->returnValue(false))));



    }

    public function testProcessAutomatedForm(){

        $this->formManager->process($this->fakeController, $this->formOperation);

    }

    public function getFormOperationConfig($sm, $em){

        return array(
            'form' => new \ZendCommerceTest\Util\Form\Page($em),
            'filter' => new \ZendCommerceTest\Util\Filter\Page(),
            'entity' => new \ZendCommerceTest\Util\Entity\Page(),
            'repository' =>  new \ZendCommerceTest\Util\Repository\PageRepository(),
            'hydrator' => new \ZendCommerceTest\Util\Hydrator\PageTestHydrator(),
            'redirectUrl' => function($entity){
                    return '/admin/publicacao/edit/' . $entity->getId();
                },
            'layout' => 'layout/admin',
        );
    }

}
/*