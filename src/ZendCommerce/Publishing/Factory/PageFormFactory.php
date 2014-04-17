<?php

namespace ZendCommerce\Publishing\Factory;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PaginaFormFactory implements FactoryInterface{

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sl){

        $em = $sl->get('Doctrine\ORM\EntityManager');
        $form = new \ZendCommerce\Publishing\Form\Page($em);
        return $form;
    }

}


?>