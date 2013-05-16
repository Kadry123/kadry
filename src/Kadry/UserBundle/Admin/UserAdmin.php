<?php

namespace Kadry\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kadry\UserBundle\Entity\User;
use Kadry\UserBundle\Form\Types\EmploymentHistoryType;
use Kadry\UserBundle\Form\Types\EmployeesHasEducationType;
;
class UserAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Dane osobowe')
                ->add('username')
                ->add('address')
                ->add('birthdayDate', 'date', array(
                    'years' => range(date('Y') - 100, date('Y') - 18)
                ))
            ->end()
            ->with('Dane do konta')
                ->add('firstName')
                ->add('lastName')
                ->add('email')
                ->add('password', 'password', array(
                    'required' => false
                ))
            ->end()
            ->with('Stosunek pracy')
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
            ->end()
            ->with('Doświadczenie')
                ->add('employmentHistory', 'collection', array(
                    'type' => new EmploymentHistoryType,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'options' => array(
                        'label' => false
                    )
                ))
            ->end()
            ->with('Edukacja')
                ->add('employeesHasEducation', 'collection', array(
                    'type' => new EmployeesHasEducationType,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'options' => array(
                        'label' => false
                    )
                ))
            ->end()
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
            ->add('employeesHasEducation')
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
