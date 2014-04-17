<?php
namespace ZendCommerce\Frontend\View\Helper;

use Zend\Config\Exception\InvalidArgumentException;
use Zend\View\Helper\AbstractHelper;

class ResponsiveNavigationHelper extends AbstractHelper{

    public function __invoke(\Zend\View\Helper\Navigation $navigation){

        $navigationHtml =  $navigation
                            ->menu()
                            ->setUlClass('navigation-list')
                            ->setMaxDepth(0)
                            ->setRenderInvisible(false);

        $phpRenderer = $this->getView();
        $retorno = $phpRenderer->render('frontend\menu\responsive-nav', array('navigation' => $navigationHtml));
        return $retorno;

    }

}

?>