<?php

namespace Kadry\UserBundle\Model;

use FOS\UserBundle\Entity\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

class Group extends BaseGroup {

    protected $id;

    public function __construct($name = null, $roles = array()) {
        $this->name = $name;
        $this->roles = $roles;
    }

}