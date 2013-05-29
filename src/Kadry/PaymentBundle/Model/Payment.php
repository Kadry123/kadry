<?php

namespace Kadry\PaymentBundle\Model;

/**
 * Description of Document
 *
 * @author Jarek
 */
class Payment{
     /**
     * @var string
     */
    protected $typ;

    /**
     * @var float
     */
    protected $brutto;

    /**
     * @var float
     */
    protected $uEmerytalne;

    /**
     * @var float
     */
    protected $uRentowe;

    /**
     * @var float
     */
    protected $uChorobowe;

    /**
     * @var float
     */
    protected $kosztUzyskaniaPrzychodu;

    /**
     * @var float
     */
    protected $podatekDochodowy;

    /**
     * @var float
     */
    protected $ulgaPodatkowa;

    /**
     * @var float
     */
    protected $ubezpieczenieZdrowotne;

    /**
     * @var float
     */
    protected $ubezpieczenieZdrowotne2;

    /**
     * @var float
     */
    protected $ewentualnePotracenia;

    /**
     * @var float
     */
    protected $wyplataNetto;

    /**
     * @var float
     */
    protected $puEmerytalne;

    /**
     * @var float
     */
    protected $puRentowe;

    /**
     * @var float
     */
    protected $puWypadkowe;

    /**
     * @var float
     */
    protected $funduszPracy;

    /**
     * @var float
     */
    protected $fgsp;

    /**
     * @var float
     */
    protected $kosztPracodawcy;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Kadry\UserBundle\Entity\User
     */
    protected $user;


    /**
     * Set typ
     *
     * @param string $typ
     * @return Payment
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;
    
        return $this;
    }

    /**
     * Get typ
     *
     * @return string 
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * Set brutto
     *
     * @param float $brutto
     * @return Payment
     */
    public function setBrutto($brutto)
    {
        $this->brutto = $brutto;
    
        return $this;
    }

    /**
     * Get brutto
     *
     * @return float 
     */
    public function getBrutto()
    {
        return $this->brutto;
    }

    /**
     * Set uEmerytalne
     *
     * @param float $uEmerytalne
     * @return Payment
     */
    public function setUEmerytalne($uEmerytalne)
    {
        $this->uEmerytalne = $uEmerytalne;
    
        return $this;
    }

    /**
     * Get uEmerytalne
     *
     * @return float 
     */
    public function getUEmerytalne()
    {
        return $this->uEmerytalne;
    }

    /**
     * Set uRentowe
     *
     * @param float $uRentowe
     * @return Payment
     */
    public function setURentowe($uRentowe)
    {
        $this->uRentowe = $uRentowe;
    
        return $this;
    }

    /**
     * Get uRentowe
     *
     * @return float 
     */
    public function getURentowe()
    {
        return $this->uRentowe;
    }

    /**
     * Set uChorobowe
     *
     * @param float $uChorobowe
     * @return Payment
     */
    public function setUChorobowe($uChorobowe)
    {
        $this->uChorobowe = $uChorobowe;
    
        return $this;
    }

    /**
     * Get uChorobowe
     *
     * @return float 
     */
    public function getUChorobowe()
    {
        return $this->uChorobowe;
    }

    /**
     * Set kosztUzyskaniaPrzychodu
     *
     * @param float $kosztUzyskaniaPrzychodu
     * @return Payment
     */
    public function setKosztUzyskaniaPrzychodu($kosztUzyskaniaPrzychodu)
    {
        $this->kosztUzyskaniaPrzychodu = $kosztUzyskaniaPrzychodu;
    
        return $this;
    }

    /**
     * Get kosztUzyskaniaPrzychodu
     *
     * @return float 
     */
    public function getKosztUzyskaniaPrzychodu()
    {
        return $this->kosztUzyskaniaPrzychodu;
    }

    /**
     * Set podatekDochodowy
     *
     * @param float $podatekDochodowy
     * @return Payment
     */
    public function setPodatekDochodowy($podatekDochodowy)
    {
        $this->podatekDochodowy = $podatekDochodowy;
    
        return $this;
    }

    /**
     * Get podatekDochodowy
     *
     * @return float 
     */
    public function getPodatekDochodowy()
    {
        return $this->podatekDochodowy;
    }

    /**
     * Set ulgaPodatkowa
     *
     * @param float $ulgaPodatkowa
     * @return Payment
     */
    public function setUlgaPodatkowa($ulgaPodatkowa)
    {
        $this->ulgaPodatkowa = $ulgaPodatkowa;
    
        return $this;
    }

    /**
     * Get ulgaPodatkowa
     *
     * @return float 
     */
    public function getUlgaPodatkowa()
    {
        return $this->ulgaPodatkowa;
    }

    /**
     * Set ubezpieczenieZdrowotne
     *
     * @param float $ubezpieczenieZdrowotne
     * @return Payment
     */
    public function setUbezpieczenieZdrowotne($ubezpieczenieZdrowotne)
    {
        $this->ubezpieczenieZdrowotne = $ubezpieczenieZdrowotne;
    
        return $this;
    }

    /**
     * Get ubezpieczenieZdrowotne
     *
     * @return float 
     */
    public function getUbezpieczenieZdrowotne()
    {
        return $this->ubezpieczenieZdrowotne;
    }

    /**
     * Set ubezpieczenieZdrowotne2
     *
     * @param float $ubezpieczenieZdrowotne2
     * @return Payment
     */
    public function setUbezpieczenieZdrowotne2($ubezpieczenieZdrowotne2)
    {
        $this->ubezpieczenieZdrowotne2 = $ubezpieczenieZdrowotne2;
    
        return $this;
    }

    /**
     * Get ubezpieczenieZdrowotne2
     *
     * @return float 
     */
    public function getUbezpieczenieZdrowotne2()
    {
        return $this->ubezpieczenieZdrowotne2;
    }

    /**
     * Set ewentualnePotracenia
     *
     * @param float $ewentualnePotracenia
     * @return Payment
     */
    public function setEwentualnePotracenia($ewentualnePotracenia)
    {
        $this->ewentualnePotracenia = $ewentualnePotracenia;
    
        return $this;
    }

    /**
     * Get ewentualnePotracenia
     *
     * @return float 
     */
    public function getEwentualnePotracenia()
    {
        return $this->ewentualnePotracenia;
    }

    /**
     * Set wyplataNetto
     *
     * @param float $wyplataNetto
     * @return Payment
     */
    public function setWyplataNetto($wyplataNetto)
    {
        $this->wyplataNetto = $wyplataNetto;
    
        return $this;
    }

    /**
     * Get wyplataNetto
     *
     * @return float 
     */
    public function getWyplataNetto()
    {
        return $this->wyplataNetto;
    }

    /**
     * Set puEmerytalne
     *
     * @param float $puEmerytalne
     * @return Payment
     */
    public function setPuEmerytalne($puEmerytalne)
    {
        $this->puEmerytalne = $puEmerytalne;
    
        return $this;
    }

    /**
     * Get puEmerytalne
     *
     * @return float 
     */
    public function getPuEmerytalne()
    {
        return $this->puEmerytalne;
    }

    /**
     * Set puRentowe
     *
     * @param float $puRentowe
     * @return Payment
     */
    public function setPuRentowe($puRentowe)
    {
        $this->puRentowe = $puRentowe;
    
        return $this;
    }

    /**
     * Get puRentowe
     *
     * @return float 
     */
    public function getPuRentowe()
    {
        return $this->puRentowe;
    }

    /**
     * Set puWypadkowe
     *
     * @param float $puWypadkowe
     * @return Payment
     */
    public function setPuWypadkowe($puWypadkowe)
    {
        $this->puWypadkowe = $puWypadkowe;
    
        return $this;
    }

    /**
     * Get puWypadkowe
     *
     * @return float 
     */
    public function getPuWypadkowe()
    {
        return $this->puWypadkowe;
    }

    /**
     * Set funduszPracy
     *
     * @param float $funduszPracy
     * @return Payment
     */
    public function setFunduszPracy($funduszPracy)
    {
        $this->funduszPracy = $funduszPracy;
    
        return $this;
    }

    /**
     * Get funduszPracy
     *
     * @return float 
     */
    public function getFunduszPracy()
    {
        return $this->funduszPracy;
    }

    /**
     * Set fgsp
     *
     * @param float $fgsp
     * @return Payment
     */
    public function setFgsp($fgsp)
    {
        $this->fgsp = $fgsp;
    
        return $this;
    }

    /**
     * Get fgsp
     *
     * @return float 
     */
    public function getFgsp()
    {
        return $this->fgsp;
    }

    /**
     * Set kosztPracodawcy
     *
     * @param float $kosztPracodawcy
     * @return Payment
     */
    public function setKosztPracodawcy($kosztPracodawcy)
    {
        $this->kosztPracodawcy = $kosztPracodawcy;
    
        return $this;
    }

    /**
     * Get kosztPracodawcy
     *
     * @return float 
     */
    public function getKosztPracodawcy()
    {
        return $this->kosztPracodawcy;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Payment
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Kadry\UserBundle\Entity\User $user
     * @return Payment
     */
    public function setUser(\Kadry\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Kadry\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}