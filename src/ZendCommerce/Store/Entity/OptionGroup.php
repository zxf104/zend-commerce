<?php

namespace ZendCommerce\Store\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="option_groups")
 */
class OptionGroup{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="text") */
    protected $label;

    /** @ORM\Column(type="boolean") */
    protected $required;

    /** @ORM\OneToMany(targetEntity="OptionGroupOption", mappedBy="") */
    protected $options;



}

?>