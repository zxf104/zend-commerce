<?php
namespace ZendCommerce\Billing\Service;

use ZendCommerce\Common\Model\FormModel;
use ZendCommerce\Common\Controller\Plugin\FormManager;
use ZendCommerce\Billing\Entity\EmbbededPayment as Payment;
use Doctrine\ORM\Repository as DoctrineRepository;

class BillingService{

    protected $entityManager;

    protected $config;

    /**
     * @var DoctrineRepository
     */
    protected $invoiceRepository;

    protected $paymentRepository;

    public function __construct($em, $config){

        $this->entityManager = $em;
        $this->config = $config;

        $this->invoiceRepository = $em->getRepository($config['repositories']['invoice']);
        $this->paymentRepository = $em->getRepository($config['repositories']['payment']);

    }

    public function getPaymentForm($stringOrInstance){

        if (!is_object($stringOrInstance)){
            $invoice = $this->repository->find($stringOrInstance);
        } else {
            $invoice = $stringOrInstance;
        }

        if ($invoice->hasPayment()){
            $payment = $invoice->getPayment();
        } else {
            $payment = new Payment($invoice);
        }

        $hydrator = new DoctrineHydrator($this->getEntityManager());

        if (!$filterName = $this->config['input_filters']['payment']){
            throw new \Exception('O filtro que será utilizado neste formulário ainda não foi configurado! Tente novamente em breve.');
        }
        $inputFilter = new $filterName;

        $form = new FormModel();
        $form
            ->setHydrator($hydrator)
            ->setRepository($this->paymentRepository)
            ->setEntity($payment)
            ->setInputFilter($inputFilter);
    }

    public function persistInvoice($invoice){
        $this->invoiceRepository->persist($invoice);
    }

}