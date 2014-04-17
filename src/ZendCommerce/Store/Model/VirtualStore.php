<?php
namespace ZendCommerce\Store\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Zend\Config\Config;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class VirtualStore implements ServiceLocatorAwareInterface{

    /*
     * @var Doctrine\Common\Collections\ArrayCollection
     */
    protected $banners;

    /*
     * @var Zend\Config\Config
     */
    protected $config;
    
    /*
     * Variável temporária para facilitar a localização de dependências
     * @var Zend\ServiceManager\ServiceLocatorInterface
     */
    protected $serviceLocator;

    /*
     * Set the configuration
     * @var Zend\Config\Config
     */
    public function __construct($config){

        $this->config = $config;

    }

    /*
     * Set service locator
     *  @var ServiceLocatorInterface
     *  @return self Provide fluent interface
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /*
     * Get service locator
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator() {
        return $this->serviceLocator;

    }   
    







}


?>