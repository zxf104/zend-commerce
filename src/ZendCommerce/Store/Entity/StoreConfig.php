<?php

namespace ZendCommerce\Store\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZendCommerce\Common\Entity\BaseEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="category")
 */
class StoreConfig extends BaseEntity{

    /**
     * @var Collection;
     * @ORM\ManyToMany(targetEntity="ZendCommerce\File\Entity\Image")
     */
    protected $banners;

    public function __construct(){
        parent::__construct();
        $this->banners = new ArrayCollection();
    }
    public function addBanner($banner){
        $this->banners->add($banner);
        return $this->banners;
    }

    public function removeBanners($banner){
        if ($this->banners->contains($banner)){
            $this->banners->remove($this->banners->indexOf($banner));
        }
        return $this->banners;
    }
}