<?php

namespace ZendCommerceTest\Store;

use PHPUnit_Framework_TestCase as TestCase;
use ZendCommerce\Billing\Service\Cart;
use ZendCommerce\Billing\Model\CartItem;
use Zend\Config\Config;
use Zend\Session\Container;

class CartTest extends TestCase{
    /*
     * @var \ZendCommerce\Store\Service\Cart;
     */
    protected $cartService;


    public function setUp(){

        $config = new Config(array());
        $session = new Container('caraatTest');
        $this->cartService = new Cart($config, $session);
    }

    public function testAddCartItem(){
        $this->addRandomItemToCart();
        $this->addRandomItemToCart();
        $this->assertEquals(count($this->cartService), 2);

    }

    public function testRemoveCartItem(){

        $this->addRandomItemToCart();
        $this->addRandomItemToCart();
        $this->addRandomItemToCart();

        foreach ($this->cartService as $key => $cartItem)
            unset($this->cartService[$key]);


        $this->assertEquals(0, count($this->cartService));
    }

    public function testClearCart(){
        
        $this->addRandomItemToCart();
        $this->addRandomItemToCart();
        $this->addRandomItemToCart();
        $this->addRandomItemToCart();
        $this->cartService->clear();
        $this->assertEquals(count($this->cartService), 0);
    }

    public function addRandomItemToCart(){
        $item = new CartItem();
        $item->setDescription('item '.rand(0, 11000));
        $this->cartService[] = $item;
    }

}