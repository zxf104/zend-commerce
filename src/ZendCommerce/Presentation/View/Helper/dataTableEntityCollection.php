<?php
namespace ZendCommerce\Frontend\View\Helper;

use Zend\View\Helper\AbstractHelper;

class dataTableEntityCollection extends AbstractHelper{

    public function __invoke($collection, $columns){
        $phpRenderer = $this->getView();
        $value = $this->extractValues($collection, $columns);

        $retorno = $phpRenderer->render('frontend\entity\table', array('data' => $value, 'headers' => $columns));
        return $retorno;
    }
    /*
     * Extract all values from models based on GETTERS on the following format: getName()
     * @var entity object | Model where the Getters should be defined
     * @var collumns array | Array of collum items, that may be a string or an array composed by two or more of the following attributes: 'type' (:button), 'label', 'href',     *
     *
     */
    public function extractValues($entities, $columns){
        $retorno = array();

        foreach ($entities as $entity){
            $entidadeRetorno = array();
                foreach($columns as $column){

                    if(isset($column['type']) && $column['type'] === 'button'){

                        isset($column['href']) ? $href = $column['href'] : $href = '';
                        isset($column['label']) ? $label = $column['label'] : $label = '';
                        isset($column['text']) ? $text = $column['text'] : $text = '';
                        $entidadeRetorno[] = '<a class="btn btn-primary pull-right" href="'.$href.$entity->getId().'">'.$text.'</a>';
                    }
                    if (isset($column['type']) && $column['type'] === 'scalar'){
                        $funcName = 'get'. ucwords($column['property']);
                        $label = $entity->$funcName();
                        $entidadeRetorno[] = $label;
                    }
                }
            $retorno[] = $entidadeRetorno;
            }
        return $retorno;
        }
    }

?>