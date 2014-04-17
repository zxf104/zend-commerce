<?php

namespace ZendCommerceTest\Util\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use League\Flysystem\File;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="pagina")
 */
class Page{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var  string  $path
     */
    protected $path;

    /**
     * @ORM\Column(type="text")
     * @var  string  $contents
     */
    protected $contents;

    /*
     * @return string
     */
    public function getPath(){
        return $this->path;
    }

    /*
     * @return string
     */
    public function setPath($path){
        $this->path = $path;
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