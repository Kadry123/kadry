<?php

namespace Kadry\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kadry\PaymentBundle\Model\Payment as ModelPayment;

/**
 * Payment
 */
class Payment extends ModelPayment
{
    public function __toString()
    {
        return (string)$this->getId();
    }
}
