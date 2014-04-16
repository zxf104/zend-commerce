<?php
namespace ZendCommerce\Store\Model;
/*
 * Interface do objeto base daStorea Virtual.
 * Vai centralizar o acesso e dependências da loja
 *
 */
abstract class AbstraStorejaVirtual{

    public abstract function selecionarProdutos();
    public abstract function selecionarCategorias();
    public abstract function selecionarBanners();
    public abstract function selecionarPedidos();

    public abstract function setConfig();
}

