<?php

namespace ZendCommerce\Publishing\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use League\Flysystem\File;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="blocks")
 */
class Block{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var  string  $identifier
     */
    protected $identifier;

    /**
     * @ORM\Column(type="text")
     * @var  string  $contents
     */
    protected $contents;

    /*
     * @return string
     */
    public function getIdentifier(){
        return $this->identifier;
    }

    /*
     * @return string
     */
    public function setIdentifier($id){
        $this->identifier = $id;
        return $this;
    }

    /*
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /*
     * @var string
     */
    public function setContents($contents){
        $this->contents = $contents;
    }

    /*
     * @return string
     */
    public function getContents(){
        return $this->contents;
    }

}