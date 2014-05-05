<?php

namespace ZendCommerce\Billing\Service;

use ZendCommerce\Billing\Model\AbstractCartItem;


class Cart implements \Iterator, \Countable, \ArrayAccess{

    /**
     * @var \Zend\Session\Container;
     */
    protected $session;

    /*
     * @var \Zend\Config\Config;
     */
    protected $config;

    /*
     * Constrói o cart
     * @var Zend\Config\Config
     * @var Zend\Session\Container
     */
    public function __construct($config, $session){
        $this->session = $session;
        $this->config = $config;
        $this->position = 0;
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

    public function getArrayCopy(){
        return $this->session->getArrayCopy();
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

