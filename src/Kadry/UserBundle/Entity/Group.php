<?php

namespace Kadry\UserBundle\Entity;

use Kadry\UserBundle\Model\Group as ModelGroup;
use Doctrine\ORM\Mapping as ORM;

class Group extends ModelGroup
{
    public function __toString() {
        return (string)$this->name;
    }
}