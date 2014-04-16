<?php

namespace ZendCommerce\Licensing\Entity;

use ZendCommerce\Store\Entity\OptionGroupOption;
use Doctrine\ORM\Mapping;

class ComposableOptionGroupOption extends OptionGroupOption{

    /**
     * @ORM\Embeddable(class = "ComposableByCopyrightEmbeddable")
     */
    protected $mockup;

    public function getMockup(){
        return $this->mockup;
    }

    public function setMockup($mockup){
        $this->mockup = $mockup;
        return $this;
    }

}