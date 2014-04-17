<?php

namespace ZendCommerce\Store\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use League\Flysystem\File;
use ZendCommerce\Common\Entity\BaseEntity;
use ZendCommerce\Common\Entity\PublishableEntityInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product extends BaseEntity{

    /** @ORM\Column(type="text") */
    protected $title;

    /** @ORM\Column(type="text", nullable=true) */
    protected $description;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="ZendCommerce\Common\Entity\Keyword")
     * @ORM\JoinTable(name="product_keywords",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="keyword_id", referencedColumnName="id")}
     *      )
     **/
    protected $keywords;

    /**
     * @ORM\Embedded(class = "ZendCommerce\Billing\Entity\Money")
     */
    protected $money;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Specification", cascade={"all"})
     * @ORM\JoinTable(name="product_specifications",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id",  nullable=true, onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="specification_id", referencedColumnName="id", unique=true, nullable=true, onDelete="CASCADE")}
     *      )
     **/
    protected $specifications;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="OptionGroup", cascade={"all"})
     * @ORM\JoinTable(name="product_option_groups",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="option_group_id", referencedColumnName="id")}
     *      )
     **/
    protected $optionGroups;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="ZendComerce\File\Entity\Thumb", cascade={"all"})
     * @ORM\JoinTable(name="product_thumbs",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="thumb_id", referencedColumnName="id")}
     *      )
     */
    protected $thumbs;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\JoinTable(name="product_categories",
     *   joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     * )
     */
    protected $categories;

}