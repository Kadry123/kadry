<?php

namespace Kadry\UserBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;

class User extends BaseUser
{
    //const leaveLength
    const TWENTY = 20;
    const TWENTY_SIX = 26;
    
    //const status
    const WORK = 0;
    const RELIEVED = 1;
    const PAID_LEAVE = 2;
    const FREE_LEAVE = 3;
    const LEAVE_ON_DEMAND = 4;
    const MATERNITY_LEAVE = 5;
    const PATERNITY_LEAVE = 6;
    
    protected $id;

    protected $groups;
    
    protected $firstName;
    
    protected $lastName;
    
    protected $address;
    
    protected $birthdayDate;
    
    protected $leaveLength;
    
    protected $status;
    
    protected $enabled = true;
    
    protected $startDate;
    
    protected $employmentHistory;
    
    public function __construct()
    {
        parent::__construct();
        $this->startDate = new \DateTime();
        $this->employmentHistory = new ArrayCollection();
    }
    
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getBirthdayDate() {
        return $this->birthdayDate;
    }

    public function setBirthdayDate($birthdayDate) {
        $this->birthdayDate = $birthdayDate;
    }

    public function getLeaveLength() {
        return $this->leaveLength;
    }

    public function setLeaveLength($leaveLength) {
        $this->leaveLength = $leaveLength;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function addEmploymentHistory(EmploymentHistory $employmentHistory){
        $this->employmentHistory[] = $employmentHistory;
        $employmentHistory->setUser($this);
    }
    
    public function getEmploymentHistory(){
        return $this->employmentHistory;
    }
    
    public function removeEmploymentHistory(EmploymentHistory $employmentHistory){
        $this->employmentHistory->removeElement($employmentHistory);
    }
}