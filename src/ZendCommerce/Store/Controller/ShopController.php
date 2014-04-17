<?php

namespace ZendCommerce\Store\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ShopController extends AbstractActionController{

    public function indexAction(){
        return new ViewModel();
    }
}