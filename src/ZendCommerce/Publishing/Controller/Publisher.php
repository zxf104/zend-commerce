<?php
namespace ZendCommerce\Publishing\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class Publisher extends AbstractActionController{

    /**
     * @var \Doctrine\ORM\EntityManager;
     */
    protected $entityManager;

    /**
     * @var \Zend\Config\Config;
     */
    protected $config;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $pageRepository;

    
    protected $blockRepository;

    /*
     * resolve all dependencies
     */
    public function __construct($sl){

        $config = $sl->get('Config');
        $this->config = $config['Publishing']; // specific module config
        $this->entityManager = $sl->get('doctrine.entitymanager.orm_default'); // proxy to doctrine entity manager
        $this->repository = $sl->get('pagina.repository');
        return $this;
    }

    /**
    *
    *
    */
    public function viewPageAction(){

        $viewModel = new ViewModel();

        $id = $this->params('id', null);

        if ($id == null){
            $viewModel->setTemplate('error/404');
            return $viewModel;
        }

        $_publicacao = $this->entityManager->getRepository($this->config['entity']['pagina'])->find($id);

        if ($_publicacao == null){
            $viewModel->setTemplate('error/404');
            return $viewModel;
        }

        else {
            $viewModel->setVariable('contents', $_publicacao->getContents());
        }
        return $viewModel;
    }
    
    public function viewBlockAction(){
        
    }
    

    /*
     * Proxy to FormManager with all dependencies setted and FormOperation configured
     */
    public function newAction(){

        return $formResponse = $this->FormManager()->process(
            $this,
            new \ZendCommerce\Common\Model\FormOperation(
                $this->getBackendFormDefinition()
            )
        );
    }

    /*
    * Proxy to FormManager with all dependencies setted and FormOperation configured     *
    */
    public function editAction(){
        return $formResponse = $this->FormManager()->process(
            $this,
            new \ZendCommerce\Common\Model\FormOperation(
                $this->getFormOperationDefinition()
            )
        );
    }


    public function deleteAction(){

        return new ViewModel();
    }

    public function listAction(){
        $array = $this->repository->findAll();
        return new ViewModel(array('entities' => $array));
    }

    /**
     * return @array
     */
    public function getFormOperationDefinition(){
        return array(
            'form' => $this->getServiceLocator()->get('pagina.form'),
            'filter' => new \ZendCommerce\Publishing\Filter\Page(),
            'hydrator' => new DoctrineHydrator($this->entityManager),
            'entity' => new \ZendCommerce\Publishing\Entity\Page(),
            'repository' => $this->getServiceLocator()->get('pagina.repository'),
            'redirectUrl' => function($entity){
                    return '/admin/publicacao/edit/' . $entity->getId();
                },
            'layout' => 'layout/admin'
        );
    }
}

?>