<?php

namespace ZendCommerce\Billing\Service;

interface CartServiceInterface implements \Iterator, \Countable, \ArrayAccess{
    public function clear();
    public function getArrayCopy();
    public function add();
    public function update();
}