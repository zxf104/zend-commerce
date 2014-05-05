<?php

namespace ZendCommerce\Common\Event;

use Zend\EventManager\Event;
use ZendCommerce\Common\AccessorsTrait;


class FormEvent extends Event{
    
    use AccessorsTrait;
    
    /**#@+     
     */
    const EVENT_VALIDATE_PRE       = 'validate.pre';    
    const EVENT_VALIDATE_ERROR = 'validate.error';
    const EVENT_VALIDATE_SUCCESS = 'validate.success';
    /**#@-*/
    
    /**
     * @var Form
     */
    protected $form;
    
    /**
     * @var InputFilter
     */
    protected $inputFilter;
    
    /**
     * @var \Traversable|array
     */
    protected $postData;
    
    /**
     * @var \DoctrineModule\Stdlib\Hydrator\DoctrineObject
     */
    protected $hydrator;

    /**
     * @var string
     */
    protected $entityId;
    
    /**
     * @var string
     */
    protected $entityClass;
    
    /**
     * @var object
     */
    protected $entity;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $template;



    
}