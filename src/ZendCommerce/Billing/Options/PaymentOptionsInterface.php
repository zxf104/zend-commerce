<?php

interface PaymentOptionsInterface{
    public function gettEntityClass();
    public function setEntityClass();

    public function getInputFilter();
    public function setInputFilter();

    public function getRepository();
    public function setRepository();

}