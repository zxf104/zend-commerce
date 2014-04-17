<?php

namespace ZendCommerce\Store\Entity;

use ZendCommerce\Common\Entity\BaseEntity;

class SpecificationLabel extends BaseEntity{

    /** @ORM\Column(type="text") */
    protected $value;

    public function setValue($value){
        $this->value = $value;
        return $this;
    }
    public function getValue(){
        return $this->value;
    }

}

