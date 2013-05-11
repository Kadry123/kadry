<?php

namespace Kadry\PaymentBundle\Model;

/**
 * Description of Document
 *
 * @author Jarek
 */
class Contract{
 
    /**
     * @var string
     */
    protected $typ;

    /**
     * @var float
     */
    protected $placaZasadnicza;

    /**
     * @var float
     */
    protected $staleDodatki;

    /**
     * @var float
     */
    protected $premia;

    /**
     * @var float
     */
    protected $prowizja;

    /**
     * @var float
     */
    protected $akord;

    /**
     * @var float
     */
    protected $inne;

    /**
     * @var float
     */
    protected $zaCzasChoroby;

    /**
     * @var float
     */
    protected $inneNs;

    /**
     * @var float
     */
    protected $zChorobowy;

    /**
     * @var float
     */
    protected $zOpiekunczy;

    /**
     * @var float
     */
    protected $zMacierzynski;

    /**
     * @var float
     */
    protected $pwss;

    /**
     * @var float
     */
    protected $uEmerytalne;

    /**
     * @var float
     */
    protected $uEmerytalnePercent;

    /**
     * @var float
     */
    protected $uRentowe;

    /**
     * @var float
     */
    protected $uRentowePercent;

    /**
     * @var float
     */
    protected $uChorobowe;

    /**
     * @var float
     */
    protected $uChorobowePercent;

    /**
     * @var float
     */
    protected $snuz1;

    /**
     * @var float
     */
    protected $snuz2;

    /**
     * @var float
     */
    protected $kosztUzyskaniaPrzychodu;

    /**
     * @var float
     */
    protected $stopaProcentowaPodatku;

    /**
     * @var float
     */
    protected $ulgaPodatkowa;

    /**
     * @var float
     */
    protected $ubezpieczenieGrupowe;

    /**
     * @var float
     */
    protected $kzp;

    /**
     * @var float
     */
    protected $komornik;

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
     * @return Contract
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
     * Set placaZasadnicza
     *
     * @param float $placaZasadnicza
     * @return Contract
     */
    public function setPlacaZasadnicza($placaZasadnicza)
    {
        $this->placaZasadnicza = $placaZasadnicza;
    
        return $this;
    }

    /**
     * Get placaZasadnicza
     *
     * @return float 
     */
    public function getPlacaZasadnicza()
    {
        return $this->placaZasadnicza;
    }

    /**
     * Set staleDodatki
     *
     * @param float $staleDodatki
     * @return Contract
     */
    public function setStaleDodatki($staleDodatki)
    {
        $this->staleDodatki = $staleDodatki;
    
        return $this;
    }

    /**
     * Get staleDodatki
     *
     * @return float 
     */
    public function getStaleDodatki()
    {
        return $this->staleDodatki;
    }

    /**
     * Set premia
     *
     * @param float $premia
     * @return Contract
     */
    public function setPremia($premia)
    {
        $this->premia = $premia;
    
        return $this;
    }

    /**
     * Get premia
     *
     * @return float 
     */
    public function getPremia()
    {
        return $this->premia;
    }

    /**
     * Set prowizja
     *
     * @param float $prowizja
     * @return Contract
     */
    public function setProwizja($prowizja)
    {
        $this->prowizja = $prowizja;
    
        return $this;
    }

    /**
     * Get prowizja
     *
     * @return float 
     */
    public function getProwizja()
    {
        return $this->prowizja;
    }

    /**
     * Set akord
     *
     * @param float $akord
     * @return Contract
     */
    public function setAkord($akord)
    {
        $this->akord = $akord;
    
        return $this;
    }

    /**
     * Get akord
     *
     * @return float 
     */
    public function getAkord()
    {
        return $this->akord;
    }

    /**
     * Set inne
     *
     * @param float $inne
     * @return Contract
     */
    public function setInne($inne)
    {
        $this->inne = $inne;
    
        return $this;
    }

    /**
     * Get inne
     *
     * @return float 
     */
    public function getInne()
    {
        return $this->inne;
    }

    /**
     * Set zaCzasChoroby
     *
     * @param float $zaCzasChoroby
     * @return Contract
     */
    public function setZaCzasChoroby($zaCzasChoroby)
    {
        $this->zaCzasChoroby = $zaCzasChoroby;
    
        return $this;
    }

    /**
     * Get zaCzasChoroby
     *
     * @return float 
     */
    public function getZaCzasChoroby()
    {
        return $this->zaCzasChoroby;
    }

    /**
     * Set inneNs
     *
     * @param float $inneNs
     * @return Contract
     */
    public function setInneNs($inneNs)
    {
        $this->inneNs = $inneNs;
    
        return $this;
    }

    /**
     * Get inneNs
     *
     * @return float 
     */
    public function getInneNs()
    {
        return $this->inneNs;
    }

    /**
     * Set zChorobowy
     *
     * @param float $zChorobowy
     * @return Contract
     */
    public function setZChorobowy($zChorobowy)
    {
        $this->zChorobowy = $zChorobowy;
    
        return $this;
    }

    /**
     * Get zChorobowy
     *
     * @return float 
     */
    public function getZChorobowy()
    {
        return $this->zChorobowy;
    }

    /**
     * Set zOpiekunczy
     *
     * @param float $zOpiekunczy
     * @return Contract
     */
    public function setZOpiekunczy($zOpiekunczy)
    {
        $this->zOpiekunczy = $zOpiekunczy;
    
        return $this;
    }

    /**
     * Get zOpiekunczy
     *
     * @return float 
     */
    public function getZOpiekunczy()
    {
        return $this->zOpiekunczy;
    }

    /**
     * Set zMacierzynski
     *
     * @param float $zMacierzynski
     * @return Contract
     */
    public function setZMacierzynski($zMacierzynski)
    {
        $this->zMacierzynski = $zMacierzynski;
    
        return $this;
    }

    /**
     * Get zMacierzynski
     *
     * @return float 
     */
    public function getZMacierzynski()
    {
        return $this->zMacierzynski;
    }

    /**
     * Set pwss
     *
     * @param float $pwss
     * @return Contract
     */
    public function setPwss($pwss)
    {
        $this->pwss = $pwss;
    
        return $this;
    }

    /**
     * Get pwss
     *
     * @return float 
     */
    public function getPwss()
    {
        return $this->pwss;
    }

    /**
     * Set uEmerytalne
     *
     * @param float $uEmerytalne
     * @return Contract
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
     * Set uEmerytalnePercent
     *
     * @param float $uEmerytalnePercent
     * @return Contract
     */
    public function setUEmerytalnePercent($uEmerytalnePercent)
    {
        $this->uEmerytalnePercent = $uEmerytalnePercent;
    
        return $this;
    }

    /**
     * Get uEmerytalnePercent
     *
     * @return float 
     */
    public function getUEmerytalnePercent()
    {
        return $this->uEmerytalnePercent;
    }

    /**
     * Set uRentowe
     *
     * @param float $uRentowe
     * @return Contract
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
     * Set uRentowePercent
     *
     * @param float $uRentowePercent
     * @return Contract
     */
    public function setURentowePercent($uRentowePercent)
    {
        $this->uRentowePercent = $uRentowePercent;
    
        return $this;
    }

    /**
     * Get uRentowePercent
     *
     * @return float 
     */
    public function getURentowePercent()
    {
        return $this->uRentowePercent;
    }

    /**
     * Set uChorobowe
     *
     * @param float $uChorobowe
     * @return Contract
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
     * Set uChorobowePercent
     *
     * @param float $uChorobowePercent
     * @return Contract
     */
    public function setUChorobowePercent($uChorobowePercent)
    {
        $this->uChorobowePercent = $uChorobowePercent;
    
        return $this;
    }

    /**
     * Get uChorobowePercent
     *
     * @return float 
     */
    public function getUChorobowePercent()
    {
        return $this->uChorobowePercent;
    }

    /**
     * Set snuz1
     *
     * @param float $snuz1
     * @return Contract
     */
    public function setSnuz1($snuz1)
    {
        $this->snuz1 = $snuz1;
    
        return $this;
    }

    /**
     * Get snuz1
     *
     * @return float 
     */
    public function getSnuz1()
    {
        return $this->snuz1;
    }

    /**
     * Set snuz2
     *
     * @param float $snuz2
     * @return Contract
     */
    public function setSnuz2($snuz2)
    {
        $this->snuz2 = $snuz2;
    
        return $this;
    }

    /**
     * Get snuz2
     *
     * @return float 
     */
    public function getSnuz2()
    {
        return $this->snuz2;
    }

    /**
     * Set kosztUzyskaniaPrzychodu
     *
     * @param float $kosztUzyskaniaPrzychodu
     * @return Contract
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
     * Set stopaProcentowaPodatku
     *
     * @param float $stopaProcentowaPodatku
     * @return Contract
     */
    public function setStopaProcentowaPodatku($stopaProcentowaPodatku)
    {
        $this->stopaProcentowaPodatku = $stopaProcentowaPodatku;
    
        return $this;
    }

    /**
     * Get stopaProcentowaPodatku
     *
     * @return float 
     */
    public function getStopaProcentowaPodatku()
    {
        return $this->stopaProcentowaPodatku;
    }

    /**
     * Set ulgaPodatkowa
     *
     * @param float $ulgaPodatkowa
     * @return Contract
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
     * Set ubezpieczenieGrupowe
     *
     * @param float $ubezpieczenieGrupowe
     * @return Contract
     */
    public function setUbezpieczenieGrupowe($ubezpieczenieGrupowe)
    {
        $this->ubezpieczenieGrupowe = $ubezpieczenieGrupowe;
    
        return $this;
    }

    /**
     * Get ubezpieczenieGrupowe
     *
     * @return float 
     */
    public function getUbezpieczenieGrupowe()
    {
        return $this->ubezpieczenieGrupowe;
    }

    /**
     * Set kzp
     *
     * @param float $kzp
     * @return Contract
     */
    public function setKzp($kzp)
    {
        $this->kzp = $kzp;
    
        return $this;
    }

    /**
     * Get kzp
     *
     * @return float 
     */
    public function getKzp()
    {
        return $this->kzp;
    }

    /**
     * Set komornik
     *
     * @param float $komornik
     * @return Contract
     */
    public function setKomornik($komornik)
    {
        $this->komornik = $komornik;
    
        return $this;
    }

    /**
     * Get komornik
     *
     * @return float 
     */
    public function getKomornik()
    {
        return $this->komornik;
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
     * @return Contract
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