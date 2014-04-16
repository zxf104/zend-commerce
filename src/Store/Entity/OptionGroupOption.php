<?php
namespace ZendCommerce\Store\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="option_group_option")
 */

class OptionGroupOption{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Store\Entity\OptionGroup")
     */
    protected $optionGroup;


    protected $label;

    protected $toFixValue;





    public function __construct(){
        $this->thumbs = new ArrayCollection();
    }

}

?>