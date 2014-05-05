<?php
/**
 * Created by PhpStorm.
 * User: R2D2
 * Date: 11/4/13
 * Time: 2:22 PM
 */

namespace ZendCommerce\Billing\Form\Fieldset\Fieldset;

use Doctrine\Common\Persistence\ObjectManager;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class Payment implements InputFilterProviderInterface{

    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
        parent::__construct('payment');
        $this->setHydrator(new DoctrineHydrator($objectManager))->setObject();

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'method',
            'options' => array(
                'value_options' => array(
                    '0' => '',
                    'creditCard' => 'Cartão de crédito',
                    'debit' => 'Débito em conta',
                    'billet' => 'Boleto bancário',
                    'transferencia' => 'Transferência bancária',
                ),
                'label' => 'Escolha o método de pagamento',
            ),
            'attributes' => array(
                'onChange' => 'sendForm(this)',
            ),
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'id' => array(
                'required' => false,

            ),
            'file' => array(
                'required' => false,

            ),
            'title' => array(
                'required' => false,

            ),
            'categories' => array(
                'required'  => false,
            ),


        );
    }

}