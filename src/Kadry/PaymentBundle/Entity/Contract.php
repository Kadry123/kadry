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
    
    protected $uEmerytalne;
    protected $uRentowe;
    protected $uChorobowe;    
    
    public function getUEmerytalne() {
        return $this->uEmerytalne;
    }

    public function setUEmerytalne($uEmerytalne) {
        $this->uEmerytalne = $uEmerytalne;
    }

    public function getURentowe() {
        return $this->uRentowe;
    }

    public function setURentowe($uRentowe) {
        $this->uRentowe = $uRentowe;
    }

    public function getUChorobowe() {
        return $this->uChorobowe;
    }

    public function setUChorobowe($uChorobowe) {
        $this->uChorobowe = $uChorobowe;
    }


}