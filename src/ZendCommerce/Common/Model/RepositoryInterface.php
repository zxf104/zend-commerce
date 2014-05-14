<?php

namespace ZendCommerce\Common\Model;

interface RepositoryInterface{

    public function getInputFilter();
    public function getHydrator();
    public function getObjectManager();

}