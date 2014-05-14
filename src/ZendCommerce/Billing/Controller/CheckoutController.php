<?php
namespace ZendCommerce\Store\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use ZendCommerce\Store\Model\CartItem;
use Zend\Authentication\AuthenticationService;

class CheckoutController extends AbstractActionController
{


    public function __construct();

    public function indexAction(){

        if ($this->zfcUserAuthentication()->hasIdentity === null){
            return $this->redirect()->toRoute('checkout/login-register');
        }

        $user = $this->zfcUserAuthentication()->getIdentity();

        if (!(count($this->cartService) > 0)){
           return $this->redirect()->toRoute('cart');
        }

        if (!$user->getPerson()->isValid() || !$user->getAddress()->isValid()){
            return $this->redirect()->toRoute('checkout/info');
        }

        if ($this->getRequest()->isPost()){
            $invoice = $this->checkoutService->generateInvoice();
            return $this->redirect->toRoute('checkout/viewInvoice', array('invoiceId' => $invoice->getId()));
        }
        return new ViewModel();
    }

    public function viewInvoiceAction(){



    }


}