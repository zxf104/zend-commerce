<?php

namespace ZendCommerce\Store\Model;

abstract class AbstractCartItem{

    /*
     * @var integer;
     */
    protected $quantidade;

    /*
     * @var AbstractProduct;
     */
    protected $produto;

    /*
     * @var AbstractOpcao;
     */
    protected $opcao;

}

?>