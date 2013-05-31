<?php

namespace Kadry\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kadry\UserBundle\Model\Leave as ModelLeave;

class Leave extends ModelLeave
{    
    public function __toString() {
        return (string) $this->getPosition();
    }

}