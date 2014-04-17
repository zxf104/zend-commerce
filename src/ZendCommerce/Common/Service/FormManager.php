<?php

namespace ZendCommerce\Common\Service;


use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\Mvc\Controller\Plugin\PluginInterface;
use Zend\Stdlib\DispatchableInterface;
use Zend\View\Model\ViewModel;

class FormManager implements PluginInterface, EventManagerAwareInterface{

    protected $template = 'presentation/form/template';

    /**
     * @var
     */
    protected $events;

    /**
     * @var \Zend\Stdlib\DispatchableInterface;
     */
    protected $controller;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    public function __construct(\Doctrine\ORM\EntityManager $em){
        $this->entityManager = $em;
    }

    /**
     * @param \Zend\Mvc\Controller\AbstractActionController $controller
     * @param \ZendCommerce\Common\Model\FormOperation $backEndForm
     * @return \Zend\View\Model\ViewModel $layoutModel
     */
    public function process(\Zend\Mvc\Controller\AbstractActionController $controller, \ZendCommerce\Common\Model\FormOperation $backEndForm){


        $viewModel = new ViewModel();
        $form = $backEndForm->form;
        $id = $controller->params('id', null);
        $repository = $backEndForm->repository;
        if (!empty($id)){
            if (method_exists($repository, 'find')){
                $entity = $repository->find($id);

                if ($entity === false ) throw new \Exception('Entity not found');

            } else {
                throw new \Exception('Repository does not support \'find\' method');
            }
        } else {
            $entity = new $backEndForm->entity();
        }
        $form->init();
        $form->setHydrator($backEndForm->hydrator);
        $filter = $backEndForm->filter;
        $form->setInputFilter($filter);
        $form->bind($entity);
        if($controller->params()->isPost()){
            $form->setData($controller->params()->fromPost());
            $this->trigger('validate.pre',array('class' => get_class($entity),'entity' => $entity, 'form' => $form));
            if ($form->isValid()){
                $this->trigger('validate.post', array('class' => get_class($form->getObject()),'entity' => $entity, 'form' => $form));
                $validatedEntity = $form->getObject();
                $this->entityManager->persist($validatedEntity);
                $this->entityManager->flush();
                $controller->flashMessenger()->addSuccessMessage('Informações atualizadas com sucesso!');
                if ($backEndForm->redirectUrl != null){
                    if (is_callable($backEndForm->redirectUrl)){
                        krumo(call_user_func($backEndForm->redirectUrl, $validatedEntity));
                        $backEndForm->redirectUrl = call_user_func($backEndForm->redirectUrl, $validatedEntity);
                        $url = $backEndForm->redirectUrl;
                        $controller->redirect()->toUrl($url);
                    }
                }
            } else {
                $this->trigger('invalid', array('class' => get_class($entity),'entity' => $entity, 'form' => $form));
            }
        }
        if ($backEndForm->template !== null){
            $viewModel->setTemplate($backEndForm->template);
        } else {
            $viewModel->setTemplate($this->template);
        }
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }

    public function setController(DispatchableInterface $controller){

        $this->controller = $controller;

    }

    public function getController(){
        return $this->controller;
    }

    public function trigger($event, $argv){

        $em = $this->getEventManager();
        $response = $em->trigger($event, $this, $argv);
        return $response;
    }

    /**
     * Set the identifiers and the event manager
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

?>