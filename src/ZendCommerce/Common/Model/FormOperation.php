<?php

namespace ZendCommerce\Common\Model;

class FormOperation{

    /**
     * @var \Zend\Form\Form
     */
    public $form;

    /**
     * @var \Zend\InputFilter\InputFilter
     */
    public $filter;

    /**
     * @var \DoctrineModule\Stdlib\Hydrator\DoctrineObject
     */
    public $hydrator;

    /**
     * @var object
     */
    public $entity;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    public $repository;

    /**
     * @var string
     */
    public $redirectUrl;

    /**
     * @var string
     */
    public $template;

    /**
     * @var string
     */
    public $layout;

    const SUCCESS_MESSAGE = 'Informações atualizadas com sucesso';
    const FAILURE_MESSAGE = 'Não foi possível completar esta operação';

    public function __construct($config){


        if (!($config instanceof \Traversable || $config instanceof \Countable || is_array($config))){
            throw new \Exception('Configurações de Formulário inválidas');
        }
        isset($config['form']) ? $this->form = $config['form'] : true;
        isset($config['filter']) ? $this->filter = $config['filter'] : true;
        isset($config['hydrator']) ? $this->hydrator = $config['hydrator'] : true;
        isset($config['repository']) ? $this->repository = $config['repository'] : true;
        isset($config['entity']) ? $this->entity = $config['entity'] : true;
        isset($config['redirectUrl']) ? $this->redirectUrl = $config['redirectUrl'] : true;
        isset($config['layout']) ? $this->layout = $config['layout'] : true;
        isset($config['template']) ? $this->template = $config['template'] : true;

    }




}


?>