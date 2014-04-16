<?php

namespace ZendCommerce;

use Zend\EventManager\EventInterface;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\ModuleManager\Feature;
use Zend\Loader;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * @{inheritdoc}
     */
    public function onBootstrap(EventInterface $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $app = $e->getParam('application');
        $em  = $app->getEventManager();

        $em->attach(MvcEvent::EVENT_DISPATCH, array($this, 'selectLayoutBasedOnRoute'));


        $sem = \Zend\EventManager\StaticEventManager::getInstance();
        $sl = $e->getApplication->

        /**
         * Create
         */
        $sem->attach('ZendCommerce\Common\Service\FormManager', 'validate.post', function($ev) use ($sl){

            $form = $ev->getParam('form');  // Form object
            // add Role 'User' after registration
            $objectManager = $e->getApplication()->getServiceManager()->get('Doctrine\ORM\EntityManager');
            $role = $objectManager->getRepository('Application\Entity\Role')->findBy(array('roleId' => 'User'));
            $user->addRoles(new \Doctrine\Common\Collections\ArrayCollection($role));
            $objectManager->flush();

        });

    }



    /**
     * Select the admin layout based on route name
     *
     * @param  MvcEvent $e
     * @return void
     */
    public function selectLayoutBasedOnRoute(MvcEvent $e)
    {
        $app    = $e->getParam('application');
        $sm     = $app->getServiceManager();
        $config = $sm->get('config');


        if (false === $config['zfcadmin']['use_admin_layout']) {
            return;
        }
        $match      = $e->getRouteMatch();
        $controller = $e->getTarget();
        if (!$match instanceof RouteMatch
            || 0 !== strpos($match->getMatchedRouteName(), 'admin')
            || $controller->getEvent()->getResult()->terminate()
        ) {
            return;
        }


        $layout     = $config['zfcadmin']['admin_layout_template'];
        $controller->layout($layout);


    }


}
