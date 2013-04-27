<?php

namespace Kadry\UserBundle\Model;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

class User extends BaseUser
{

    protected $id;

    protected $groups;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}