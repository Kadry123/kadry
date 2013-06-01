<?php

namespace Kadry\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kadry\UserBundle\Entity\User;
class LeaveAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('dateFrom', null, array(
                'label' => 'Od'
            ))
            ->add('dateTo', null, array(
                'label' => 'Do'
            ))
            ->add('hoursNumber', null, array(
                'label' => 'Ilość godzin'
            ))
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('dateFrom')
            ->add('dateTo')
            ->add('hoursNumber')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array()
                )
            ))
        ;
    }
}
