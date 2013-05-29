<?php

namespace Kadry\PaymentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kadry\PaymentBundle\Entity\Contract;
use Sonata\AdminBundle\Route\RouteCollection;

class ContractAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
        $collection->remove('create');
    }    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $refl = new \ReflectionClass('Kadry\PaymentBundle\Entity\Contract');
        $formMapper
                ->add('typ', 'choice', array(
                    'label' => 'Typ umowy',
                    'choices' => $refl->getConstants(),
                    'required' => true
                ))
                ->add('kosztUzyskaniaPrzychodu', 'number', array(
                    'label' => 'Koszt uzyskania przychodu',
                    'required' => false
                ))                
                ->add('brutto', 'number', array(
                    'label' => 'Kwota brutto',
                    'required' => true
                ))
                ->setHelps(array(
                    'kosztUzyskaniaPrzychodu' => 'Wartość procentowa(%) w przypadku umowy o dzieło i umowy zlecenie, wartość pieniężna w innym przypadku'
                ))
                ->with('Umowa zlecenie')
                    ->add('zOdliczZus', null, array(
                        'label' => 'Odlicz składkę zus',
                        'required' => false
                    ))
                    ->add('zUZ', null, array(
                        'label' => 'Ubezpieczenie zdrowotne',
                        'required' => false
                    ))
                    ->add('zZZP', null, array(
                        'label' => 'Zleceniobiorca jest pracownikiem zleceniodawcy',
                        'required' => false
                    ))
                ->end()
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('user.firstname', null, array(
                'label' => 'Imię'
            ))
            ->add('user.lastname', null, array(
                'label' => 'Nazwisko'
            ))
            ->add('user.pesel', null, array(
                'label' => 'Pesel'
            ))
            ->add('typ', null, array(
                'label' => 'Typ umowy'
            ))
            ->add('brutto', null, array(
                'label' => 'Kwota brutto'
            ))
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
