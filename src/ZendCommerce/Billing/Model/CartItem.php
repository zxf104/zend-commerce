<?php

namespace ZendCommerce\Store\Model;

class CartItem extends AbstractCartItem{

    protected $lineDescription;
    
    protected $followLink;
    
    protected $quantity;
    
    protected $unitValue;
    
    
    public function setLineDescription($line){
        $this->lineDescription = $line;
        return $this;
        
    }
    
    public function getLineDescription(){
        return $this->lineDescription;
        
    }
    
    public function setFollowLink($followLink){
        $this->followLink = $followLink;
    }
    
    public function getFollowLink(){
        return $this->followLink;
    }
    
    public function setQuantity($qty){
        $this->quantity = $qty;
        return $this;
    }
    
    public function getQuantity(){        
        return $this->quantity;        
    }
    
    public function setUnitValue($unitValue){
        $this->unitValue = $unitValue;
        reutnr $this;        
    }
    
    public function getUnitValue(){
        return $this->unitValue;
        
    }
}

?>