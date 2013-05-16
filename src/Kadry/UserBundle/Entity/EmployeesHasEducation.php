<?php

namespace Kadry\UserBundle\Entity;

use Kadry\UserBundle\Model\EmployeesHasEducation as ModelEmployeesHasEducation;
use Symfony\Component\Validator\ExecutionContextInterface;
/**
 * Description of Document
 *
 * @author Kamil
 */
class EmployeesHasEducation extends ModelEmployeesHasEducation{
    public function __toString() {
        return (string)$this->getEducation()->getSchoolName();
    }
    
    public function isDateRangeValid(ExecutionContextInterface $context){
        if($this->getDateFrom() > $this->getDateTo()){
            $context->addViolationAt('dateFrom', 'Data od musi być mniejsza od daty do!');
        }
    }
}