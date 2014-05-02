<?php

namespace ZendCommerce\Store\Model;

abstract class AbstractCartItem{
    
    abstract function setLineDescription();
    abstract function setFollowLink();
    abstract function setQuantity();
    abstract function setUnitValue();
    
}

?>