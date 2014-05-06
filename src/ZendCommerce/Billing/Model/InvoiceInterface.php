<?php
namespace ZendCommerce\Billing\Model;

interface InvoiceInterface
{

    function getPayment();
    function setPayment($payment);

    function getMoney();

    function getPerson();
    function setPerson($person);

    function getInvoiceLines();
    function addInvoiceLine($object);
    function addInvoiceLines($collection);
    function removeInvoiceLine($index);
}