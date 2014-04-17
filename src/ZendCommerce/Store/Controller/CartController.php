<?php

namespace ZendCommerce\Store\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use ZendCommerce\Store\Model\CartItem;

class CartController extends AbstractActionController
{
    /**
    *    
    * @var \ZendCommerce\Store\Service\Cart;
    */
    protected $cartService;
    
    public function __construct(\ZendCommerce\Store\Service\Cart $cartService){

        $this->cartService = $cartService;
    }    

    public function indexAction()
    {
        return new ViewModel(array(
           'cart' => $this->cartService->toArray(),
        ));
    }

    public function addAction(){

        $productId = $this->params('productId', null);
        $optionId = $this->params('optionId', null);
        $qty = $this->params('qty', 1);

       $this->cartService->addItem(new CartItem($productId, $optionId, $qty));

        if ($this->getRequest()->isXmlHttpRequest()){
            return new JsonModel(
                $this->cartService->toArray()
            );
        }
        $this->redirect()->toRoute('cart');
    }

    public function clearAction(){
        $this->cartService->clear();
        if ($this->getRequest()->isXmlHttpRequest()){
            return new JsonModel(
                $this->cartService->toArray()
            );
        }
        $this->redirect()->toRoute('cart');
    }

    public function deleteAction(){
        $token = $this->params('token', null);
        if ($token === null){
            throw new \Exception('missing param token');
        }
        $this->cartService->removeItem($token);

        if ($this->getRequest()->isXmlHttpRequest()){
            return new JsonModel(
                $this->cartService->toArray()
            );
        }
        $this->redirect()->toRoute('cart');
    }

    public function updateAction(){

        $token = $this->params('token', null);
        $productId = $this->params('productId', null);
        $optionId = $this->params('optionId', null);
        $qty = $this->params('qty', 1);

        if ($token === null || $productId === null){
            throw new \Exception('Invalid arguments provided');
        }

        $this->cartService->updateItem($token, new CartItem($productId, $optionId, $qty));

        if ($this->getRequest()->isXmlHttpRequest()){
            return new JsonModel(
                $this->cartService->toArray()
            );
        }
        $this->redirect()->toRoute('cart');
    }


}
