<?php

namespace Kadry\UserBundle\Model;

use Doctrine\ORM\Mapping as ORM;

class Leave
{    
    protected $id;

    protected $hoursNumber;

    protected $dateFrom;

    protected $dateTo;
    
    protected $user;
    
    public function getId() {
        return $this->id;
    }

    public function getHoursNumber() {
        return $this->hoursNumber;
    }

    public function setHoursNumber($hoursNumber) {
        $this->hoursNumber = $hoursNumber;
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
    
    public function setUser(User $user){
        $this->user = $user;
    }
    
    public function getUser(){
        return $this->user;
    }
}