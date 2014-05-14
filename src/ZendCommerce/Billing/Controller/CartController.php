<?php
namespace ZendCommerce\Store\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use ZendCommerce\Store\Model\CartItem;

class CartController extends AbstractActionController
{

    /**
    * @var \ZendCommerce\Billing\Service\CartServiceInterface;
    */
    protected $cartService;

    public function __construct(\ZendCommerce\Billing\Service\CartServiceInterface $cartService){
        $this->cartService = $cartService;
    }    

    public function indexAction()
    {
        return new ViewModel(array(
           'cart' => $this->cartService->getArrayCopy(),
        ));
    }

    public function addAction(){

        $productId = $this->params('productId', null);
        $optionId = $this->params('optionId', null);
        $qty = $this->params('qty', 1);
        $followLink = $this->params('followLink', null);

        if ($this->cartService->add($productId, $optionId, $qty, $followLink) !== true){
            $this->flashMessanger()->addWarningMessage('Erro ao adicionar o produto no carrinho');
        }

        if ($this->getRequest()->isXmlHttpRequest()){
            return new JsonModel(
                $this->cartService->getArrayCopy()
            );
        }
        return $this->redirect()->toRoute('cart');
    }

    public function clearAction(){
        $this->cartService->clear();
        if ($this->getRequest()->isXmlHttpRequest()){
            return new JsonModel(
                $this->cartService->getArrayCopy()
            );
        }
        $this->redirect()->toRoute('cart');
    }

    public function deleteAction(){
        $token = $this->params('token', null);
        if ($token === null){
            throw new \Exception('missing param token');
        }
        unset($this->cartService[$token]);

        if ($this->getRequest()->isXmlHttpRequest()){
            return new JsonModel(
                $this->cartService->getArrayCopy()
            );
        }
        $this->redirect()->toRoute('cart');
    }

    public function updateAction(){

        $token = $this->params('token', null);
        $qty = $this->params('qty', 1);


        if ($token === null || $qty === null){
            throw new \Exception('Invalid arguments provided');
        }

        if ($this->cartService->update($token, $qty) !== true){
            $this->flashMessanger()->addWarningMessage('Erro ao atualizar o produto no carrinho');
        }

        if ($this->getRequest()->isXmlHttpRequest()){
            return new JsonModel(
                $this->cartService->getArrayCopy()
            );
        }
        $this->redirect()->toRoute('cart');
    }


}
