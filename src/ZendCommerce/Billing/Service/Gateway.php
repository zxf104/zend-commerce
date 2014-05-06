<?php
namespace ZendCommerce\Billing\Service;

use ZendCommerce\Common\Model\FormModel;
use ZendCommerce\Common\Controller\Plugin\FormManager;
use ZendCommerce\Billing\Entity\PaymentEntity;

class BillingService{

    protected $entityManager;

    protected $config;

    protected $invoiceRepository;

    protected $paymentRepository;

    public function __construct($em, $config){

        $this->entityManager = $em;
        $this->config = $config;

        $this->invoiceRepository = $em->getRepository($config['repositories']['invoice']);
        $this->paymentRepository = $em->getRepository($config['repositories']['payment']);



    }

    public function getPaymentForm($stringOrInstance){

        $this->registerFormCallbacks();

        if (!is_object($stringOrInstance)){
            $invoice = $this->repository->find($stringOrInstance);
        } else {
            $invoice = $stringOrInstance;
        }

        if ($invoice->hasPayment()){
            $paymentEntity = $invoice->getPayment();
        } else {
            $paymentEntity = new PaymentEntity($invoice);
        }

        $hydrator = new DoctrineHydrator($this->getEntityManager());
        $form = new FormModel();
        $form
            ->setHydrator($hydrator)
            ->setRepository($this->paymentRepository)
            ->setEntity($paymentEntity);
    }

}