<?php
namespace ZendCommerce\Store\Model;

abstract class AbstractLicensedProduct{


    /*
     * @var AbstractDireitoAutoral
     */
    protected $direito_autoral;

    /*
     * @var float
     */
    protected $taxa_licenciamento;

    /*
    * @var bool
    */
    protected $publicado;

    /*
     * @var File\Entity\Image
     */
    protected $thumbs;

    /*
     * @varStorea\Model\AbstractProduto
     */
    protected $produto;

}

?>