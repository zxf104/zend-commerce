<?php

namespace ZendCommerce\Licensing\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use User\Entity\User;

/**
 * @ORM\Embeddable
 */
class EmbeddedLicence{

    /** @ORM\Column(type = "decimal", nullable=true) */
    protected $ratio;

    /** @ORM\Column(type = "datetime", nullable=true) */
    protected  $complianceDate;

    /** @ORM\Column(type = "string") */
    protected $copyrightId;

    public function getRatio(){
        return $this->ratio;
    }
    public function setRatio($ratio){
        $this->ratio = $ratio;
        return $this;
    }
    public function getComplianceDate(){
        return $this->complianceDate;
    }
    public function setComplianceDate($date){
        $this->complianceDate = $date;
        return $this;
    }
    public function getCopyrightId(){
        return $this->copyrightId;
    }
    public function setCopyrightId($id){
        $this->copyrightId = $id;
        return $this;
    }


}

?>