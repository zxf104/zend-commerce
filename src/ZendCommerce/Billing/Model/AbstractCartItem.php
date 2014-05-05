<?php

namespace ZendCommerce\Billing\Model;

abstract class AbstractCartItem{

    abstract function setDescription($description);
    abstract function setFollowLink($link);
    abstract function setQuantity($qty);
    abstract function setUnitValue($unitValue);

    abstract function getDescription();
    abstract function getFollowLink();
    abstract function getQuantity();
    abstract function getUnitValue();
}

?>