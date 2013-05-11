<?php

namespace Kadry\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kadry\UserBundle\Model\EmploymentHistory as ModelEmploymentHistory;

class EmploymentHistory extends ModelEmploymentHistory
{    
    public function __toString() {
        return (string) $this->getPosition();
    }
}