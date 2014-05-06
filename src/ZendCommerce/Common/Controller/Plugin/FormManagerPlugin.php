<?php

namespace ZendCommerce\Common\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use ZendCommerce\Common\Model\FormModel;
use Zend\View\Model\ViewModel;

class FormManagerPlugin extends AbstractPlugin implements EventManagerAwareInterface{

    /**#@+
     */
    const EVENT_VALIDATE_PRE = 'validate.pre';
    const EVENT_VALIDATE_ERROR = 'validate.error';
    const EVENT_VALIDATE_SUCCESS = 'validate.success';
    /**#@-*/

    /**
     * @var
     */
    protected $events;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;


    public function __construct(\Doctrine\ORM\EntityManager $em){
        $this->entityManager = $em;
    }

    /**
     * @param \ZendCommerce\Common\Model\FormModel $formEvent
     * @return \Zend\View\Model\ViewModel $viewModel
     * @throws \Exception
     */
    public function process(FormModel $form){

        $viewModel = new ViewModel();
        $entity = $form->getEntity();
        $form = $form->getForm();
        $id = $form->getEntityId();
        $repository = $form->getRepository();
        $filter = $form->getFilter();
        $hydrator = $form->getHydrator();
        $postData = $form->getPostData();
        $entityClass = $form->getEntityClass();


        if (!$entity){
            if (!empty($id)){
                if (method_exists($repository, 'find')){
                    $entity = $repository->find($id);
                    if ($entity === false ) throw new \Exception('Entity not found');

                } else {
                    throw new \Exception('Repository does not support \'find\' method');
                }
            } else {

                if (!$entityClass){
                    throw new \Exception('Undefined Entity Class');
                }
                $entity = new $entityClass;
            }
        }
        $form->init();
        $form->setHydrator($hydrator);
        $form->setInputFilter($filter);
        $form->bind($entity);


        if(count($postData) > 0){
            $form->setData($postData);
            $this->trigger($this::EVENT_VALIDATE_PRE, $formEvent);
            if ($form->isValid()){
                $validatedEntity = $form->getObject();
                $form->setEntity($validatedEntity);
                $this->trigger($this::EVENT_VALIDATE_SUCCESS, $formEvent);
                $this->entityManager->persist($validatedEntity);
                $this->entityManager->flush();
            } else {
                $this->trigger($this::EVENT_VALIDATE_ERROR, $formEvent);
            }
        }

        $viewModel->setTemplate($this->template);
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }

    public function trigger($event, $argv){

        $em = $this->getEventManager();
        $response = $em->trigger($event, $this, $argv);
        return $response;
    }

    /**
     * Set the identifiers and the event manager
     * @param EventManagerInterface $events
     * @return self
     */
    public function setEventManager(EventManagerInterface $events)
    {
        $events->setIdentifiers(array(
            __CLASS__,
            get_called_class(),
        ));

        $this->events = $events;

        return $this;
    }

    /**
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (null === $this->events) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }

}

