<?php

namespace Kadry\PaymentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kadry\PaymentBundle\Entity\Contract;

class ContractAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $refl = new \ReflectionClass('Kadry\PaymentBundle\Entity\Contract');
        $formMapper
//            ->with('Wynagrodzenia objęte składkami na ubezpieczenia społeczne')
            ->with('Wynagrodzenia objęte składkami na ubezpieczenia społeczne')
                ->add('typ', 'choice', array(
                    'required' => true,
                    'choices' => $refl->getConstants()
                ))
                ->add('placaZasadnicza', null, array(
                    'label' => 'Płaca zasadnicza',
                    'required' => false,
                ))
                ->add('staleDodatki', null, array(
                    'label' => 'Stałe dodatki',
                    'required' => false,
                ))
                ->add('premia', null, array(
                    'required' => false,
                ))
                ->add('prowizja', null, array(
                    'required' => false,
                ))
                ->add('akord', null, array(
                    'required' => false,
                ))
                ->add('inne', null, array(
                    'required' => false,
                ))
            ->end()
                
            ->with('Wynagrodzenia nieskładkowe')
                ->add('zaCzasChoroby', null, array(
                    'label' => 'Za czas choroby',
                    'required' => false
                ))
                ->add('inneNs', null, array(
                    'label' => 'Inne',
                    'required' => false
                ))
            ->end()
                
            ->with("Zasiłki")
                ->add('zChorobowy', null, array(
                    'label' => 'Chorobowy',
                    'required' => false
                ))
                ->add('zOpiekunczy', null, array(
                    'label' => 'Opiekuńczy',
                    'required' => false
                ))
                ->add('zMacierzynski', null, array(
                    'label' => 'Macierzyński',
                    'required' => false,
                ))
            ->end()
            
            ->with("Podstawa wymiaru składek społecznych")
                ->add('pwss', null, array(
                    'required' => false,
                    'label' => 'Podstawa wymiaru składek społecznych'
                ))
            ->end()
            
            ->with("Składki na ubezpieczenia społeczne finansowane przez pracownika")
                ->add('uEmerytalnePercent', null, array(
                    'required' => false,
                    'label' => 'Emerytalne(%)'
                ))
                ->add('uRentowePercent', null, array(
                    'required' => false,
                    'label' => 'Rentowe(%)'
                ))
                ->add('uChorobowePercent', null, array(
                    'required' => false,
                    'label' => 'Chorobowe(%)'
                ))
            ->end()
                
            ->with("Składka na ubezpieczenie zdrowotne")
                ->add('snuz1', null, array(
                    'required' => false,
                    'label' => 'Składka na ubezpieczenie zdrowotne 1(%)'
                ))
                ->add('snuz2', null, array(
                    'label' => 'Składka na ubezpieczenie zdrowotne 2(%)'
                ))
            ->end()
                
            ->with("Koszty uzyskania przychodów")
                ->add('kosztUzyskaniaPrzychodu', null, array(
                    'required' => false,
                    'label' => 'Koszty uzyskania przychodów'
                ))
            ->end()

            ->with("Stopa procentowa podatku")
                ->add('stopaProcentowaPodatku', null, array(
                    'required' => false,
                    'label' => 'Stopa procentowa podatku'
                ))
            ->end()
                
            ->with("Stopa procentowa podatku")
                ->add('stopaProcentowaPodatku', null, array(
                    'required' => false,
                    'label' => 'Stopa procentowa podatku'
                ))
            ->end()
                
            ->with("Ulga podatkowa")
                ->add('ulgaPodatkowa', null, array(
                    'required' => false,
                    'label' => 'Ulga podatkowa'
                ))
            ->end()
                
            ->with("Inne potrącenia")
                ->add('ubezpieczenieGrupowe', null, array(
                    'required' => false,
                    'label' => 'Ubezpieczenie grupowe'
                ))
                ->add('kzp', null, array(
                    'required' => false,
                ))
                ->add('komornik', null, array(
                    'required' => false,
                ))
            ->end()
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('typ')
            ->add('placaZasadnicza', null, array(
                'label' => 'Płaca zasadnicza'
            ))
            ->add('staleDodatki', null, array(
                'label' => 'Stałe dodatki'
            ))
            ->add('premia', null, array(
            ))
            ->add('prowizja', null, array(
            ))
            ->add('akord', null, array(
            ))
            ->add('inne', null, array(
            ))
            ->add('zaCzasChoroby', null, array(
                'label' => 'Za czas choroby'
            ))
            ->add('inneNs', null, array(
                'label' => 'InneNS'
            ))  
            ->add('zChorobowy', null, array(
                'label' => 'Chorobowy'
            ))
            ->add('zOpiekunczy', null, array(
                'label' => 'Opiekuńczy'
            ))
            ->add('zMacierzynski', null, array(
                'label' => 'Macierzyński'
            ))

            ->add('pwss', null, array(
                'label' => 'Podstawa wymiaru składek społecznych'
            ))

            ->add('uEmerytalnePercent', null, array(
                'label' => 'Emerytalne(%)'
            ))
            ->add('uRentowePercent', null, array(
                'label' => 'Rentowe(%)'
            ))
            ->add('uChorobowePercent', null, array(
                'label' => 'Chorobowe(%)'
            ))

            ->add('snuz1', null, array(
                'label' => 'Składka na ubezpieczenie zdrowotne 1(%)'
            ))
            ->add('snuz2', null, array(
                'label' => 'Składka na ubezpieczenie zdrowotne 2(%)'
            ))

            ->add('kosztUzyskaniaPrzychodu', null, array(
                'label' => 'Koszty uzyskania przychodów'
            ))

            ->add('stopaProcentowaPodatku', null, array(
                'label' => 'Stopa procentowa podatku'
            ))

            ->add('ulgaPodatkowa', null, array(
                'label' => 'Ulga podatkowa'
            ))

            ->add('ubezpieczenieGrupowe', null, array(
                'label' => 'Ubezpieczenie grupowe'
            ))
            ->add('kzp', null, array(
            ))
            ->add('komornik', null, array(
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
