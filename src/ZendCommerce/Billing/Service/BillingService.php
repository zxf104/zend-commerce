<?php
namespace ZendCommerce\Billing\Service;

use ZendCommerce\Common\Model\FormModel;
use ZendCommerce\Common\Controller\Plugin\FormManager;
use ZendCommerce\Billing\Entity\EmbbededPayment;
use ZendCommerce\Billing\Repository\InvoiceRepository;

class BillingService{

    protected $entityManager;

    protected $config;

    /**
     * @var InvoiceRepository;
     */
    protected $invoiceRepository;

    public function __construct($em, $config){

        $this->entityManager = $em;
        $this->config = $config;
        $this->invoiceRepository = $em->getRepository($config['repositories']['invoice']);

    }

    /**
     * @param int|object : $stringOrInstance
     * @return FormModel
     * @throws \Exception
     */
    public function getPaymentForm($stringOrInstance){

        if (!is_object($stringOrInstance)){
            $invoice = $this->invoiceRepository->find($stringOrInstance);
        } else {
            $invoice = $stringOrInstance;
        }

        if ($invoice->hasPayment()){
            $payment = $invoice->getPayment();
        } else {
            $payment = new EmbbededPayment($invoice);
        }

        $hydrator = new DoctrineHydrator($this->getEntityManager());

        if (!$filterName = $this->config['input_filters']['payment']){
            throw new \Exception('O filtro que será utilizado neste formulário ainda não foi configurado! Tente novamente em breve.');
        }
        $inputFilter = new $filterName;

        $form = new FormModel();
        $form
            ->setHydrator($hydrator)
            ->setRepository($this->invoiceRepository)
            ->setEntity($payment)
            ->setInputFilter($inputFilter);

        return $form;
    }

    public function persistInvoice($invoice){
        return $this->invoiceRepository->persist($invoice);
    }

}