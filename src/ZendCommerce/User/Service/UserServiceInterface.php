<?php

namespace ZendCommerce\User\Service;

interface UserServiceInterface{

    public function getIdentity();
    public function getEditFormEvent($id, $data);


}