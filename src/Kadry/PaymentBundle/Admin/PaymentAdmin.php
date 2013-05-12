<?php

namespace Kadry\PaymentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kadry\PaymentBundle\Entity\Payment;
use Sonata\AdminBundle\Route\RouteCollection;

class PaymentAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('edit');
    }    
        
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('kosztUzyskaniaPrzychodu', null, array(
                    'label' => 'Koszt uzyskania przychodu'
                ))
//                ->add('ewentualnePotracenia', null, array(
//                    'label' => 'ewentualne potrącenia'
//                ))
                ->add('created', null, array(
                    'label' => 'Data wystawienia'
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
                'label' => 'kosztPracodawcy'
            ))
            ->add('created', null, array(
                'label' => 'Data wystawienia'
            ))
        ;
    }
}
