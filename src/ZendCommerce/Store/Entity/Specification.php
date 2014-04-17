<?php

namespace ZendCommerce\Store\Entity;

use ZendCommerce\Common\Entity\BaseEntity;

class Specification extends BaseEntity{


    /**
     * @var SpecificationLabel
     * @ORM\ManyToOne(targetEntity="SpecificationLabel") /*
     */
    protected $label;

    /** @ORM\Column(type="text") */
    protected $value;

    public function getLabel(){
        return $this->label->getValue();
    }
    public function setLabel(SpecificationLabel $label){
        $this->label = $label;
    }
    public function getValue(){
        return $this->value;
    }
    public function setValue($value){
        $this->value = $value;
        return $this;
    }

}