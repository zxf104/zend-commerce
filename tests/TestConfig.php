<?php
// module/Application/test/TestConfig.php.dist
return array(
    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule'
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
    '../../../config/autoload/{,*.}{global,local}.php',
),
        'module_paths' => array(
    'module',
    'vendor',
),
    ),
);