<?php

namespace ZendCommerce\File\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection;
use League\Flysystem\File as FileBaseModel;

/*
 * @ORM\Entity
 * @ORM\Table(name="arquivos")
 */
class File extends FileBaseModel{


    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var  string  $path
     */
    protected $path;

    /*
     * @return string
     */
    public function getPath(){
        return $this->path;
    }

    /*
     * @var string
     */
    public function setPath($path){
        $this->path = $path;
    }

    /*
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    public function __construct($path){
        $this->path = $path;
    }



}