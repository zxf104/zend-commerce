<?php
namespace ZendCommerce\Publishing\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PublisherControllerFactory implements FactoryInterface{

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sl){

        $controller = new \ZendCommerce\Publishing\Controller\Publisher($sl);
        return $controller;



    }

}


?>