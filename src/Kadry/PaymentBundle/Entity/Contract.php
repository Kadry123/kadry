<?php
namespace Kadry\PaymentBundle\Entity;

use Kadry\PaymentBundle\Model\Contract as ModelContract;

/**
 * Description of Document
 *
 * @author Jarek
 */
class Contract extends ModelContract{

    const UMOWA_O_PRACE = "UMOWA_O_PRACE";
    const UMOWA_O_DZIELO = "UMOWA_O_DZIELO";
    const UMOWA_ZLECENIE = "UMOWA_ZLECENIE";
    
    public function __toString()
    {
        return (string)$this->typ;
    }
}