<?php

namespace ZendCommerce\Store\Model;

class CartItem extends AbstractCartItem{


    /*
     * Representa determinado produto daStorea
     * @var integer
     */
    protected $productId;

    /*
     * Representa determinada opção de um produto
     * @var integer
     */
    protected $optionId;

    /*
     * Representa a quantidade de determinado produto no Cart
     * @var int
     */
    protected $quantity;

    public function __construct($produto, $opcao, $quantidade){

        $this->productId = $produto;
        $this->optionId = $opcao;
        $this->quantity = $quantidade;       

    }

}

?>