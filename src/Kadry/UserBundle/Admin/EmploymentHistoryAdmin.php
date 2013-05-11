<?php

namespace Kadry\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kadry\UserBundle\Entity\User;
class EmploymentHistoryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('companyName', null, array(
                'label' => 'Firma'
            ))
            ->add('dateFrom', null, array(
                'label' => 'Od'
            ))
            ->add('dateTo', null, array(
                'label' => 'Do'
            ))
            ->add('position', null, array(
                'label' => 'Posada'
            ))
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('companyName')
            ->add('dateFrom')
            ->add('dateTo')
            ->add('position')
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
