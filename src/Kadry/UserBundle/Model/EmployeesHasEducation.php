<?php

namespace Kadry\UserBundle\Model;

/**
 * Description of Document
 *
 * @author Kamil
 */
class EmployeesHasEducation {
    
    /**
     * @var \DateTime
     */
    protected $dateFrom;

    /**
     * @var \DateTime
     */
    protected $dateTo;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Kadry\UserBundle\Entity\User
     */
    protected $user;

    /**
     * @var \Kadry\UserBundle\Entity\Education
     */
    protected $education;


    /**
     * Set dateFrom
     *
     * @param \DateTime $dateFrom
     * @return EmployeesHasEducation
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
    
        return $this;
    }

    /**
     * Get dateFrom
     *
     * @return \DateTime 
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * Set dateTo
     *
     * @param \DateTime $dateTo
     * @return EmployeesHasEducation
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
    
        return $this;
    }

    /**
     * Get dateTo
     *
     * @return \DateTime 
     */
    public function getDateTo()
    {
        return $this->dateTo;
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
     * @return EmployeesHasEducation
     */
    public function setUser(User $user = null)
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

    /**
     * Set education
     *
     * @param \Kadry\UserBundle\Entity\Education $education
     * @return EmployeesHasEducation
     */
    public function setEducation(Education $education = null)
    {
        $this->education = $education;
    
        return $this;
    }

    /**
     * Get education
     *
     * @return \Kadry\UserBundle\Entity\Education 
     */
    public function getEducation()
    {
        return $this->education;
    }
}