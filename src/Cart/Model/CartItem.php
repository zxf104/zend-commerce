<?php

namespace ZendCommerce\Cart\Model;

class CartItem extends AbstractCartItem{


    /*
     * Representa determinado produto daStorea
     * @var AbstractProduct
     */
    protected $produto;

    /*
     * Representa determinada opção de um produto
     * @var AbstractOpcao
     */
    protected $opcao;

    /*
     * Representa a quantidade de determinado produto no Cart
     * @var int
     */
    protected $quantidade;

    public function __construct($produto, $opcao, $quantidade){

        $this->produto = $produto;
        $this->opcao = $opcao;
        $this->quantidade = $quantidade;

    }

}

?>