<?php

namespace Kadry\UserBundle\Model;

use Doctrine\ORM\Mapping as ORM;

class EmploymentHistory
{    
    protected $id;

    protected $companyName;

    protected $dateFrom;

    protected $dateTo;

    protected $position;
    
    protected $user;
    
    public function getId() {
        return $this->id;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    public function getDateFrom() {
        return $this->dateFrom;
    }

    public function setDateFrom($dateFrom) {
        $this->dateFrom = $dateFrom;
    }

    public function getDateTo() {
        return $this->dateTo;
    }

    public function setDateTo($dateTo) {
        $this->dateTo = $dateTo;
    }

    public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
    }
    
    public function setUser(User $user){
        $this->user = $user;
    }
    
    public function getUser(){
        return $this->user;
    }
}