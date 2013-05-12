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
    protected $brutto;

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
     * Set brutto
     *
     * @param float $brutto
     * @return Contract
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