<?php 

namespace ZendCommerce\File\Service;

use League\Flysystem\Filesystem;
use Doctrine\ORM\EntityManager;
/*
* Save
* ComposePSDToImage
* thumbnail
*/
class File{

    /*
     * @var Filesystem
     */
    protected $fileSystem;

    protected $config;

    protected $session;

    protected $fileRoot = '/data';

    /*
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(Filesystem $fs, $config, $session){
        $this->fileSystem = $fs;
        $this->config = $config;
        $this->session = $session;
    }

    public function remove(\ZendCommerce\File\Entity\File $arq){
        $this->fileSystem->delete($arq->getPath());
    }

    /**
     * @var string|array $temp_name File located at tmp directory
     * @var string $destFolder Where to put the file
     * @returns \ZendCommerce\File\Entity\File
     */
    public function store($tmp_name, $destFolder = '/uploads'){
        $validator = new \Zend\Validator\File\Exists();
        if (!$validator->isValid($tmp_name)){
            throw new Exception\InvalidTemporaryFilePathException('Arquivo Inválido:' . var_dump($tmp_name));
        }
        $arquivo = new \ZendCommerce\File\Entity\File($this->fileRoot . $destFolder . strftime('%G-%m-%d-%H-%S') . end(explode('.', $tmp_name)));
        $this->fileSystem->writeStream($arquivo->getPath(), fopen($tmp_name, 'r+'));
        return $arquivo;
    }

}