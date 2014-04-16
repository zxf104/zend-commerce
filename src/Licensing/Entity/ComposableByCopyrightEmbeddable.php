<?php

namespace ZendCommerce\Licensing\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Embeddable
 */
class ComposableByCopyrightEmbeddable{

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $mockupFilePath;

    public function setMockupFilePath($path){
        $this->mockupFilePath = $path;
        return $this;
    }

    public function getMockupFilePath(){
        return $this->mockupFilePath;
    }

}