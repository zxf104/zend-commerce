<?php

namespace ZendCommerce\File\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/*
 * @ORM\Entity
 * @ORM\Table(name="hq_images")
 */
class Image extends File{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /*
     * @ORM\OneToMany(targetEntity="File")
     * @var ArrayCollection
     */
    protected $thumbs;

    public function __construct(){
        $this->thumbs = new ArrayCollection();
    }

}



?>