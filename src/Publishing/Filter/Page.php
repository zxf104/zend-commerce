<?php
namespace ZendCommerce\Publishing\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\Input;
use Zend\Validator;


class Page extends InputFilter{

    public function __construct(){
        $factory     = new InputFactory();
        $this->add($factory->createInput(array(
            'name'     => 'path',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim', ),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 100,
                    ),
                ),
            ),
        )));
        $this->add($factory->createInput(array(
            'name'     => 'id',
            'required' => true,
            'filters'  => array(
                array('name' => 'Int'),
            ),
        )));
        $this->add($factory->createInput(array(
            'name'     => 'contents',
            'required' => true,
            'filters'  => array(
                array('name' => 'StringTrim'),
            ),
        )));
        return $this;
    }

}

?>