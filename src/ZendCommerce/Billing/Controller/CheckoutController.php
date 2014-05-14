<?php
namespace ZendCommerce\Store\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use ZendCommerce\Store\Model\CartItem;
use Zend\Authentication\AuthenticationService;

class CheckoutController extends AbstractActionController
{

    protected $cartService;

    protected $checkoutService;

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

        $viewModel = new ViewModel();
        $invoiceId = $this->params('invoiceId', null);

        if (null === $invoiceId){
            throw new \ZendCommerce\Common\Exception\InvalidArgumentException();
        }

        $invoice = $this->checkoutService->getInvoiceRepository()->find($invoiceId);

        if (null === $invoice){
            $viewModel->setTemplate('checkout/invoice-not-found');
        }
        $viewModel->setVariable('invoice', $invoice);
        return $viewModel;
    }

    public function processPaymentFormAction(){

        $invoiceId = $this->params()->invoiceId();
        $form = $this->checkoutService->getPaymentForm($invoiceId);
        $inputFilter = $this->checkoutService->getPaymentInputFilter();
        $data = $this->params()->fromPost();




    }


}