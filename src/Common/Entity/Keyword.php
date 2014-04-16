<?php

namespace ZendCommerce\Common\Entity;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="common_keywords")
 */
class KeywordEntity extends BaseEntity{

    /** @ORM\Column(type="string") */
    protected $label;

    public function setLabel($label){
        $this->label = $label;
        return $this;
    }

    public function getLabel(){

        return $this->label;

    }

}