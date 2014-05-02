<?php

namespace ZendCommerce\Store\Form;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;
use Zend\Form\Element;
use Licensing\Entity\Copyright as CopyrightObject;

class CopyrightInfoForm extends Form{


    /**
     * @var \Doctrine\ORM\EntityManager;
     */
    protected $objectManager;

    public function __construct(EntityManager $em){

        $this->objectManager = $em;

    }

    public function init(){

        parent::__construct('copyright-info');

        $objectManager = $this->getObjectManager();

        $this
            ->setHydrator(new DoctrineHydrator($objectManager))
            ->setObject(new CopyrightObject());

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'path',
            'options' => array(
                'label' => 'URL'
            )
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'contents',
            'options' => array(
                'label' => 'Conteúdo'
            )
        ));

        $this->add(new Element\Csrf('security'));

        $submit = new Element\Submit('submit');
        $submit->setValue('Enviar');
        $this->add($submit);

    }

    public function setObjectManager(EntityManager $em){
        $this->objectManager = $em;
        return $this;

    }

    public function getObjectManager(){
        return $this->objectManager;

    }




}

?>