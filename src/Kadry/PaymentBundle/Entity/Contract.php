<?php
namespace Kadry\PaymentBundle\Entity;

use Kadry\PaymentBundle\Model\Contract as ModelContract;

/**
 * Description of Document
 *
 * @author Jarek
 */
class Contract extends ModelContract{

    const UMOWA_O_PRACE = "Umowa o pracę";
    const UMOWA_O_DZIELO = "Umowa o dzieło";
    const UMOWA_ZLECENIE = "Umowa zlecenie";
    
    public function __toString()
    {
        return (string)$this->typ;
    }
}