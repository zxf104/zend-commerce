<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'cart' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/cart',
                    'defaults' => array(
                        'controller' => 'ZendCommerce\Store\Controller\Cart',
                        'action' => 'index',
                    ),
                ),
            ),            
        ),
    ),
    'service_manager' => array(        
        'factories' => array(
            'mainNavigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),

    ),    
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController'
        ),
    ),
    'view_manager' => array(                
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Page 1',
                'id' => 'home-link',
                'uri' => '/',
            ),
            array(
                'label' => 'Zend',
                'uri' => 'http://www.zend-project.com/',
                'order' => 100,
            ),
            array(
                'label' => 'Page 2',
                'controller' => 'page2',
                'pages' => array(
                    array(
                        'label' => 'Page 2.1',
                        'action' => 'page2_1',
                        'controller' => 'page2',
                        'class' => 'special-one',
                        'title' => 'This element has a special class',
                        'active' => true,
                    ),
                ),
            ),
        ),
    ),

);
