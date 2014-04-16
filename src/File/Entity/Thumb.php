<?php

namespace ZendCommerce\File\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/*
 * @ORM\Entity
 * @ORM\Table(name="thumbs")
 */
class Thumb{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="File")
     * @var File
     */
    protected $file;

    /*
     * @ORM\Column(type="text")
     * @var string
     */
    protected $altura;

    /*
     * @ORM\Column(type="text")
     * @var string
     */
    protected $largura;

}