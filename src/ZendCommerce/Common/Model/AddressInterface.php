<?php


namespace ZendCommerce\Common\Model;

interface AddressInterface{

    function getZipCode();

    function getCountry();

    function getCity();

    function getLineOne();

    function getLineTwo();



}