<?php

namespace ZendCommerce\Common\Factory;

use Zend\ServiceManager\FactoryInterface;

class FormManagerServiceFactory implements FactoryInterface{

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sl){
        $em = $sl->getServiceLocator()->get('Doctrine\ORM\EntityManager');        
        $fm = new \ZendCommerce\Common\Controller\Plugin\FormManager($em);
        return $fm;
    }
}


?>