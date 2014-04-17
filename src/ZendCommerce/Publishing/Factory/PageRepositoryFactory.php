<?php
namespace ZendCommerce\Publishing\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PaginaRepositoryFactory implements FactoryInterface{

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sl){

        $em = $sl->get('Doctrine\ORM\EntityManager');
        $config = $sl->get('Config');
        $entity = $config['Publishing']['entity'];
        return $em->getRepository($entity);

    }

}


?>