<?php

namespace ZendCommerce\Store\Model;

/*
 * @depends module File
 */
abstract class AbstractDireitoAutoral{

    /*
     * @varStorea\Model\User
     */
    protected $autor;

    /*
     * @var bool
     */
    protected $licenca_valida;

    /*
     * @var File\Entity\Model
     */
    protected $arquivo;


}

?>