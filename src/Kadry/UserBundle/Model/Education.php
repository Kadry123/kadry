<?php

namespace Kadry\UserBundle\Model;

use \Doctrine\Common\Collections\ArrayCollection;
/**
 * Description of Document
 *
 * @author Kamil
 */
class Education {
    
    /**
     * @var string
     */
    protected $schoolName;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $employeesHasEducation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->employeesHasEducation = new ArrayCollection();
    }
    
    /**
     * Set schoolName
     *
     * @param string $schoolName
     * @return Education
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;
    
        return $this;
    }

    /**
     * Get schoolName
     *
     * @return string 
     */
    public function getSchoolName()
    {
        return $this->schoolName;
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
     * Add employeesHasEducation
     *
     * @param \Kadry\UserBundle\Entity\EmployeesHasEducation $employeesHasEducation
     * @return Education
     */
    public function addEmployeesHasEducation(EmployeesHasEducation $employeesHasEducation)
    {
        $this->employeesHasEducation[] = $employeesHasEducation;
    
        return $this;
    }

    /**
     * Remove employeesHasEducation
     *
     * @param \Kadry\UserBundle\Entity\EmployeesHasEducation $employeesHasEducation
     */
    public function removeEmployeesHasEducation(EmployeesHasEducation $employeesHasEducation)
    {
        $this->employeesHasEducation->removeElement($employeesHasEducation);
    }

    /**
     * Get employeesHasEducation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployeesHasEducation()
    {
        return $this->employeesHasEducation;
    }
}