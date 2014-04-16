<?php

/*
*
* adicionarProduto(@CartItem)
* removerProduto(@CartItem||@integer) #boolean
* limparCart() #boolean
*
*/
namespace ZendCommerce\Cart\Service;

class Cart{

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
        return $this;
    }

    /*
     * Adiciona item no cart e retorna um identificador para futuras operações
     * @varStorea\Model\AbstractCartItem
     * @return int
     */
    public function addItem (\Store\Model\AbstractCartItem $item){
        $key = time();
        $this->session[$key] = $item;
        return $key;
    }

    /*
     * Remove um item do cart. Retorna true se o item foi removido e false se não foi
     * @vStoreoja\Model\AbstractCartItem : int
     * @return bool
     */
    public function removeItem($itemOrInt){
        if (is_integer($itemOrInt)){
            unset($this->session[$itemOrInt]);
            return true;
        }
        else if ($itemOrInt instanceof \Store\Model\AbstractCartItem){
            foreach ($this->session as $key => $cartItem){
                if ($itemOrInt == $cartItem){
                    $this->session->offsetUnset($key);
                    return true;
                }
            }
        }
        return false;
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

    /*
     * Retorna array de items do cart
     * @return array
     */
    public function toArray(){
        return $this->session->getArrayCopy();
    }

}


?>

