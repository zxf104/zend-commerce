<?php

namespace ZendCommerce\Common\Model;

interface ProductInterface{

    public function getCartDescription();
    public function hasOption($optionOrId);
    public function getOption();
    public function getUnitValue();

}