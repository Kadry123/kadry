<?php

namespace Kadry\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kadry\UserBundle\Model\EmploymentHistory as ModelEmploymentHistory;
use Symfony\Component\Validator\ExecutionContextInterface;

class EmploymentHistory extends ModelEmploymentHistory
{    
    public function __toString() {
        return (string) $this->getPosition();
    }
    
    public function isDateRangeValid(ExecutionContextInterface $context){
        if($this->getDateFrom() > $this->getDateTo()){
            $context->addViolationAt('dateFrom', 'Data od musi być mniejsza od daty do!');
        }
    }
}