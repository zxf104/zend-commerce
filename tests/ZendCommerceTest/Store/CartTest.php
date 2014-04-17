<?php

namespace ZendCommerceTest\Store;

use PHPUnit_Framework_TestCase as TestCase;
use ZendCommerce\Store\Service\Cart;
use ZendCommerce\Store\Model\CartItem;
use Zend\Config\Config;
use Zend\Session\Container;

class CartTest extends TestCase{
    /*
     * @var \ZendCommerce\Store\Service\Cart;
     */
    protected $cartService;


    public function setUp(){

        $config = new Config(array());
        $session = new Container('cartTest');
        $this->cartService = new Cart($config, $session);
    }

    public function testAddRemoveCartItem(){
        $item = new CartItem(1, null, 2);
        $key = $this->cartService->addItem($item);
        $this->assertEquals($this->cartService->toArray(), array($key => $item));


        $this->cartService->removeItem($key);
        $this->assertEquals($this->cartService->toArray(), array());
    }

    public function testClearCart(){
        $item = new CartItem(1, null, 2);
        $key = $this->cartService->addItem($item);
        $this->cartService->clear();
        $this->assertEquals($this->cartService->toArray(), array());
    }

}