<?php

namespace Kadry\UserBundle\Entity;

use Kadry\UserBundle\Model\User as ModelUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;

class User extends ModelUser
{
    public function __toString() {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}