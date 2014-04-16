<?php

namespace ZendCommerce\Licensing\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Store\Entity\Product;

/**
 * @ORM\Entity
 * @ORM\Table(name="composed_products")
 */
class ComposedProduct{


    /**
     * @ORM\Embedded(class = "ComposedByCopyrightEmbeddable")
     *
     */
    protected $copyright;

    public function setCopyright(ComposedByCopyrightEmbeddable $embeddable){
        $this->copyright = $embeddable;
        return $this;

    }

    public function getCopyright(){
        return $this->copyright;
    }

}