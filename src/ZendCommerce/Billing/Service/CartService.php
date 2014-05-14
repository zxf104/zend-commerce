<?php

namespace ZendCommerce\Billing\Service;

use ZendCommerce\Billing\Model\AbstractCartItem;


class CartService implements \Iterator, \Countable, \ArrayAccess{

    /**
     * @var \Zend\Session\Container;
     */
    protected $session;

    /*
     * @var \Zend\Config\Config;
     */
    protected $config;

    /**
     * @var \ZendCommerce\Store\Service\ProductServiceInterface;
     */
    protected $productService;

    /**
     * @param $config
     * @param $session
     * @param \ZendCommerce\Store\Service\ProductServiceInterface $productService
     */
    public function __construct($config, $session, \ZendCommerce\Store\Service\ProductServiceInterface $productService){
        $this->session = $session;
        $this->config = $config;
        $this->position = 0;
        $this->productService = $productService;
        return $this;

    }

    /*
     * Retira todos os items do cart
     * @return void
     */
    public function clear(){
        $it = $this->session->getIterator();
        foreach ($it as $key => $value){
            unset($this->session[$key]);
        }
    }

    /**
     * @param int $productId
     * @param null $optionId
     * @param int $qty
     * @param string $followLink
     * @return bool
     */

    public function add($productId, $optionId = null, $qty, $followLink){

        $itemDescription = '';
        $product = null;

        if ($productId === null){
            return false;
        } else {
            $product = $this->productService->find($productId);
        }

        if ($followLink === null || $product === null){
            return false;
        }

        $itemDescription .= $product->getCartDescription();

        if ($optionId !== null && $product->hasOption($optionId)){
            $option = $product->getOption($optionId);
            $itemDescription .= $option->getCartDescription();
        }

        $item = new CartItem();
        $item
            ->setQuantity($qty)
            ->setDescription($itemDescription)
            ->setUnitValue($product->getUnitValue())
            ->setFollowLink($followLink);

        $this->session[] = $item;

        return true;


    }

    /**
     * @param int|string $token
     * @param int $qty
     * @return bool
     */
    public function update($token, $qty){

        if(!isset($this->session[$token])){
            return false;
        }

        $this->session[$token]->setQuantity($qty);

        return true;


    }

    /**
     * @return array
     */
    public function getArrayCopy(){
        return $this->session->getArrayCopy();
    }

    public function next(){
        ++$this->position;
        return $this->current();
    }
    public function current(){
        return $this->session[$this->position];
    }
    public function key(){
        return $this->position;
    }
    public function rewind(){
        $this->position = 0;
    }
    public function valid(){

        return isset($this->session[$this->position]);
    }
    public function count(){
        return count($this->session->getArrayCopy());
    }
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->session[count($this->session->getArrayCopy())] = $value;
        } else {
            $this->session[$offset] = $value;
        }
    }
    public function offsetExists($offset) {
        return isset($this->session[$offset]);
    }
    public function offsetUnset($offset) {
        unset($this->session[$offset]);
    }
    public function offsetGet($offset) {
        return isset($this->session[$offset]) ? $this->session[$offset] : null;
    }


}


?>

