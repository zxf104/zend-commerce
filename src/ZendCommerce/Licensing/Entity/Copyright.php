<?php

namespace ZendCommerce\Licensing\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use ZendCommerce\File\Entity\File;
use Doctrine\ORM\Mapping as ORM;


/**
 *  @ORM\Entity
 *  @ORM\Table(name="copyright")
 */
class Copyright {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="text") */
    protected $title;

    /** @ORM\Column(type="text") */
    protected $description;

    /** @ORM\Column(type="text") */
    protected $path;

    /** @ORM\Column(type="boolean") */
    protected $valid;

    /** @ORM\Column(type="datetime") */
    protected $date_created;

    /**
     * @var \ZendCommerce\Store\Entity\Category
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\JoinTable(name = "copyright_categories")
     */
    protected $categories;

    /**
     * @var \ZendCommerce\Store\Entity\Category
     * @ORM\OneToMany(targetEntity= "ComposedProduct", inversedBy= "copyright" )
     */
    protected $composedProducts;

    public function __construct()
    {
        $this->date_created = new \DateTime();
        $this->composedProducts = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    /**
    * @return int
    */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPath(){
        return $this->path;
    }

    /**
     * @return string
     */
    public function setPath($path){
        $this->path = $path;
        return $this;
    }

    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setValid($valid){
        $this->valid = (bool) $valid;
        return $this;
    }

    public function isValid(){
        return $this->valid;
    }

    public function setComposedProducts($array){
        $this->composedProducts = $array;
    }
    public function getComposedProducts(){
        return $this->composedProducts;
    }



}

?>