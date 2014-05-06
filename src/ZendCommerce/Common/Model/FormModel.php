<?php

namespace ZendCommerce\Common\Model;

use ZendCommerce\Common\DevMagic;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterInterface;

class FormModel{
    
    use DevMagic;

    /**
     * @var Form
     */
    protected $form;
    
    /**
     * @var InputFilterInterface
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