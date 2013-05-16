<?php

namespace Kadry\UserBundle\Entity;

use Kadry\UserBundle\Model\Education as ModelEducation;
/**
 * Description of Document
 *
 * @author Kamil
 */
class Education extends ModelEducation{

    public function __toString() {
        return (string)$this->getSchoolName();
    }
    
    
}