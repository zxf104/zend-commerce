
<?php

namespace ZendCommerce\Licensing\Service;

use ZendCommerce\File\Service\File as FileSevice;

class LicensingManager {

    /**
     * @var \ZendCommerce\File\Service\File
     */
    protected $fileService;

    protected $composableProductRepository;

    protected $composedProductRepository;

    protected $copyrightRepository;


    public function __construct($fileService){

        $this->fileService = $fileService;

    }


    public function createComposedProducts($copyright){



    }
}