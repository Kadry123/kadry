<?php

namespace Kadry\PaymentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kadry\PaymentBundle\Entity\Payment;
use Kadry\PaymentBundle\Entity\Contract;
use Sonata\AdminBundle\Route\RouteCollection;

class PaymentAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('details', '/details/{id}');
        $collection->remove('edit');
        $collection->remove('view');
    }    
        
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//                ->add('kosztUzyskaniaPrzychodu', null, array(
//                    'label' => 'Koszt uzyskania przychodu'
//                ))
//                ->add('ewentualnePotracenia', null, array(
//                    'label' => 'ewentualne potrącenia'
//                ))
                ->add('created', null, array(
                    'label' => 'Data wystawienia',
                    'required' => true
                ))
                ->add('user', 'entity', array(
                        'class' => 'KadryUserBundle:User',
                        'required' => true, 
                        'label' => 'Pracownik',
                        'query_builder' => function( $er) {
                                            return $er->createQueryBuilder('u')
                                            ->select('u')
                                            ->innerJoin('u.contract', 'c')
                                            ->where('c.brutto > 0')
                                            ->orderBy('u.firstName', 'ASC')        
                                            ->addOrderBy('u.lastName', 'ASC')
                                                    ;
                                        }
                    ))                                      
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('typ')
            ->add('user.firstname', null, array(
                'label' => 'Imię'
            ))
            ->add('user.lastname', null, array(
                'label' => 'Nazwisko'
            ))
            ->add('user.pesel', null, array(
                'label' => 'Pesel'
            ))  
            ->add('brutto', null, array(
                'label' => 'Bruto'
            ))
            ->add('wyplataNetto', null, array(
                'label' => 'Netto'
            ))
            ->add('kosztPracodawcy', null, array(
                'label' => 'Koszt Pracodawcy'
            ))
            ->add('created', null, array(
                'label' => 'Data wystawienia'
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'detail' => array(
                        'template' => 'KadryPaymentBundle:AdminPayment:list__action_view.html.twig',
                        'label' => 'Szczegóły'
                    ),
//                        'view' => array(),
//                        'edit' => array(),
//                        'delete' => array()
                )
            ))                    
        ;
    }
}
