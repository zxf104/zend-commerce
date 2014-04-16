<?php

namespace ZendCommerce\Store\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Common\Entity\BaseEntity;
/**
 *  @ORM\Entity
 *  @ORM\Table(name="category")
 */
class Category extends BaseEntity{


    /** @ORM\Column(type="text") */
    protected $label;

    /** @ORM\ManyToOne(targetEntity="Category") */
    protected $parent;

    public function getLabel(){
        return $this->label;
    }

    public function setLabel($label){
        $this->label = (string) $label;
        return $this;
    }

    public function setParent(Category $category){
        $this->parent = $category;
    }

    public function getParent(){
        return $this->parent;
    }
}