<?php

namespace Kadry\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kadry\UserBundle\Entity\User;
use Kadry\UserBundle\Form\Types\EmploymentHistoryType;
class UserAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('plainPassword', 'password', array(
                'required' => false
            ))
            ->add('address')
            ->add('birthdayDate', 'date', array(
                'years' => range(date('Y') - 100, date('Y') - 18)
            ))
            ->add('leaveLength', 'choice', array(
                'choices' => array(
                    User::TWENTY => User::TWENTY,
                    User::TWENTY_SIX => User::TWENTY_SIX
                )
            ))
            ->add('status', 'choice', array(
                'choices' => array(
                    User::WORK => 'Pracujący',
                    User::RELIEVED => 'Zwolniony',
                    User::PAID_LEAVE => 'Urlop płatny',
                    User::FREE_LEAVE => 'Urlop bezpłatny',
                    User::LEAVE_ON_DEMAND => 'Urlop na żądanie',
                    User::MATERNITY_LEAVE => 'Urlop macierzyński',
                    User::PATERNITY_LEAVE => 'Urlop tacierzyński',
                )
            ))
            ->add('startDate', 'date', array(
                'years' => range(date('Y') - 100, date('Y'))
            ))
            ->add('groups')
            ->add('employmentHistory', 'collection', array(
                'type' => new EmploymentHistoryType,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'options' => array(
                    'label' => false
                )
            ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('address')
            ->add('birthdayDate')
            ->add('leaveLength')
            ->add('status')
            ->add('groups')
            ->add('startDate')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array()
                )
            ))
        ;
    }
    
//    public function prePersist($object) {
//    }
//    
//    public function preUpdate($object){
//    }
}
