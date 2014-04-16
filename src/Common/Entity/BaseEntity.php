<?php

namespace ZendCommerce\Common\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Represents the base entity (persisted objects) of the Zend Commerce Module
 */
class BaseEntity{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="boolean") */
    protected $onRecycleBin;

    /** @ORM\Column(type="datetime") */
    protected $dateCreated;

    public function __construct(){
        $this->dateCreated = new \Datetime();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function setOnRecycleBin($bool){
        $this->onRecycleBin = (bool) $bool;
        return $this;
    }

    public function getOnRecycleBin(){
        return $this->onRecycleBin;
    }

    public function getDateCreated(){
        return $this->dateCreated;
    }
}

