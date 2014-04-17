<?php

namespace ZendCommerce\Licensing\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Embeddable
 */
class ComposedByCopyrightEmbeddable{

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $copyrightId;

    /**
     * @ORM\Column(type = "text")
     */
    protected $productId;

    public function setCopyrightId($id){
        $this->copyrightId = $id;
        return $this;
    }

    public function getCopyright(){
        return $this->copyrightId;
    }
}