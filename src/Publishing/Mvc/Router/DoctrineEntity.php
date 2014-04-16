<?php

namespace ZendCommerce\Publishing\Mvc\Router;

use Zend\Mvc\Router\Http\RouteInterface;
use Zend\Mvc\Router\Http\RouteMatch;
use Zend\Stdlib\RequestInterface as Request;
use Zend\Stdlib\ArrayUtils;
use Zend\Mvc\Router\Exception\InvalidArgumentException;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DoctrineEntity implements RouteInterface, ServiceLocatorAwareInterface{


    protected $defaults = array();

    protected $routePluginManager = null;

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $routePluginManager
     */
    public function setServiceLocator(ServiceLocatorInterface $routePluginManager)
    {
        $this->routePluginManager = $routePluginManager;
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->routePluginManager;
    }


    /**
     * Create a new page route.
     */
    public function __construct($defaults = array())
    {
        $this->defaults = $defaults;
    }


    /**
     * Create a new route with given options.
     */
    public static function factory($options = array())
    {
        if ($options instanceof \Traversable) {
            $options = ArrayUtils::iteratorToArray($options);
        } elseif (!is_array($options)) {
            throw new InvalidArgumentException(__METHOD__ . ' expects an array or Traversable set of options');
        }

        if (!isset($options['defaults'])) {
            $options['defaults'] = array();
        }

        if (!isset($options['defaults']['entity'])) {
            throw new \Exception('Missing "entity" in options array');
        }

        if (!isset($options['defaults']['matchKey'])) {
            throw new \Exception('Missing "key" in options array');
        }

        return new static($options['defaults']);
    }

    /**
     * Match a given request.
     */
    public function match(Request $request, $pathOffset = null)
    {
        //@todo test the Request object and return a \Zend\Mvc\Router\RouteMatch instance
        // get the service locator
        $serviceLocator = $this->routePluginManager->getServiceLocator();

        if (!method_exists($request, 'getUri')) {
            return null;
        }
        $uri  = $request->getUri();
        $path = $uri->getPath();
        $collection = $serviceLocator->get('doctrine.entitymanager.orm_default')->getRepository($this->defaults['entity'])->findBy(array($this->defaults['matchKey'] => $path));
        if (count($collection) > 0){


            $page = array_shift($collection);

            $routeMatch = new RouteMatch(array(
                'controller' => 'Publishing\Controller\Publishing',
                'action' => 'view',
                'id' => $page->getId()
            ), 0);
            $routeMatch->setMatchedRouteName('post');
            return $routeMatch;

        }
        return null;
    }

    /**
     * Assemble the route.
     */
    public function assemble(array $params = array(), array $options = array())
    {

        //@todo assemple the route and return the URL as string
        return '/' . $params['slug'];
    }

    /**
     * Get a list of parameters used while assembling.
     */
    public function getAssembledParams()
    {
        return array('slug');
    }


}


?>