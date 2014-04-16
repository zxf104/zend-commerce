<?php

namespace ZendCommerce\Licensing\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Store\Entity\Product;

/**
 * @ORM\Entity
 * @ORM\Table(name="licensable_product")
 */
class ComposableProduct extends Product{

    /**
     * @ORM\Embeddable(class = "ComposableByCopyrightEmbeddable")
     */
    protected $composable;

}