<?php

namespace Kadry\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kadry\PaymentBundle\Entity\Contract;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Kadry\PaymentBundle\Entity\Payment;

class AdminPaymentController extends CRUDController
{
    
    /**
     * return the Response object associated to the create action
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @return Response
     */
    
    public function createAction()
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }

        $object = $this->admin->getNewInstance();

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod()== 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
############################################################################################                
            $user = $object->getUser();
            $contract = $user->getContract();
            if($contract->getTyp() == Contract::UMOWA_O_PRACE)
            {
                $object->setTyp($contract->getTyp());
                $object->setBrutto($contract->getBrutto());
                $object->setUEmerytalne($this->container->getParameter('s_emerytalna'));
                $object->setURentowe($this->container->getParameter('s_rentowa'));
                $object->setUChorobowe($this->container->getParameter('s_chorobowa'));

                $uEmerytalne = round($object->getBrutto() * $object->getUEmerytalne(), 2);
                $uRentowe = round($object->getBrutto() * $object->getURentowe(), 2);
                $uChorobowe = round($object->getBrutto() * $object->getUChorobowe(), 2);

                $kwotaPoPotraceniu = $object->getBrutto() - 
                        $uEmerytalne -
                        $uRentowe -
                        $uChorobowe
                        ;
                $object->setKosztUzyskaniaPrzychodu($this->container->getParameter('koszt_uzyskania_przychodu'));

                $dochodDoOpodatkowania = $kwotaPoPotraceniu - $object->getKosztUzyskaniaPrzychodu();

                $object->setPodatekDochodowy($this->container->getParameter('podatek_dochodowy_1'));

                $podatekDochodowy = round($dochodDoOpodatkowania * $object->getPodatekDochodowy(), 2);

                if(!$object->getUlgaPodatkowa())
                {
                    $object->setUlgaPodatkowa($this->container->getParameter('ulga_podatkowa'));
                }

                if($podatekDochodowy > $object->getUlgaPodatkowa())
                {
                    $zaliczkaNaPodatekDochodowy = round($podatekDochodowy - $object->getUlgaPodatkowa());
                }
                else
                {
                    $zaliczkaNaPodatekDochodowy = 0;
                }

                $object->setUbezpieczenieZdrowotne($this->container->getParameter('s_ubez_zdro_1'));
                $object->setUbezpieczenieZdrowotne2($this->container->getParameter('s_ubez_zdro_2'));

                $ubezpieczenieZdrowotne1 = round($kwotaPoPotraceniu * $object->getUbezpieczenieZdrowotne(), 2);
                $ubezpieczenieZdrowotne2 = round($kwotaPoPotraceniu * $object->getUbezpieczenieZdrowotne2(), 2);

                $zaliczkaNaPodatekDochodowyDoZaplaty = $zaliczkaNaPodatekDochodowy - $ubezpieczenieZdrowotne2;

                $kwotaNetto = $kwotaPoPotraceniu -
                        $ubezpieczenieZdrowotne1 -
                        $zaliczkaNaPodatekDochodowyDoZaplaty
                        ;

                $object->setWyplataNetto(round($kwotaNetto, 2));

                /*
                 * Skladki pracodawcy
                 */
                $object->setPuEmerytalne($this->container->getParameter('ps_emerytalna'));
                $object->setPuRentowe($this->container->getParameter('ps_rentowa'));
                $object->setPuWypadkowe($this->container->getParameter('ps_wypadkowe'));
                $object->setFunduszPracy($this->container->getParameter('ps_fundusz_pracy'));
                $object->setFgsp($this->container->getParameter('ps_fgsp'));


                $object->setKosztPracodawcy(
                        round($object->getBrutto() * $object->getPuEmerytalne(), 2) + 
                        round($object->getBrutto() * $object->getPuRentowe(), 2) + 
                        round($object->getBrutto() * $object->getPuWypadkowe(), 2) + 
                        round($object->getBrutto() * $object->getFunduszPracy(), 2) + 
                        round($object->getBrutto() * $object->getFgsp(), 2) + 
                        $object->getBrutto()
                        );

            }elseif($contract->getTyp() == Contract::UMOWA_ZLECENIE)
            {
################################## ZLECENIE ################################################                
                $object->setTyp($contract->getTyp());
                $object->setBrutto($contract->getBrutto());
                
                $kwotaPoPotraceniu = $object->getBrutto();

                $uEmerytalne = 0;
                $uRentowe = 0;
                $uChorobowe = 0;
                if($contract->getZOdliczZus())
                {
                    $object->setUEmerytalne($this->container->getParameter('s_emerytalna'));
                    $object->setURentowe($this->container->getParameter('s_rentowa'));
                    $object->setUChorobowe($this->container->getParameter('s_chorobowa'));                      
                    
                    $uEmerytalne = round($object->getBrutto() * $object->getUEmerytalne(), 2);
                    $uRentowe = round($object->getBrutto() * $object->getURentowe(), 2);
                    $uChorobowe = round($object->getBrutto() * $object->getUChorobowe(), 2);

                    $kwotaPoPotraceniu = $object->getBrutto() - 
                            $uEmerytalne -
                            $uRentowe -
                            $uChorobowe
                            ;       
                    
                    
                $object->setPuEmerytalne($this->container->getParameter('ps_emerytalna'));
                $object->setPuRentowe($this->container->getParameter('ps_rentowa'));
                $object->setPuWypadkowe($this->container->getParameter('ps_wypadkowe'));
                $object->setFunduszPracy($this->container->getParameter('ps_fundusz_pracy'));
                $object->setFgsp($this->container->getParameter('ps_fgsp'));


                }
                $object->setKosztPracodawcy(
                        round($object->getBrutto() * $object->getPuEmerytalne(), 2) + 
                        round($object->getBrutto() * $object->getPuRentowe(), 2) + 
                        round($object->getBrutto() * $object->getPuWypadkowe(), 2) + 
                        round($object->getBrutto() * $object->getFunduszPracy(), 2) + 
                        round($object->getBrutto() * $object->getFgsp(), 2) + 
                        $object->getBrutto()
                        );                    
                $zus =      
                        $uEmerytalne +
                        $uRentowe +
                        $uChorobowe;

//                Podstawa do ubezpieczenia zdrowotnego
                $kosztUzyskaniaPrzychodu = round(($kwotaPoPotraceniu * $contract->getKosztUzyskaniaPrzychodu())/100, 2);
                $object->setKosztUzyskaniaPrzychodu($kosztUzyskaniaPrzychodu);
                
                $podstawa = $kwotaPoPotraceniu;

                $zdrowotne = 0;
                
                $ubezpieczenieZdrowotne1 = 0;
                $ubezpieczenieZdrowotne2 = 0;
                
                if($contract->getZUZ())
                {
                    $object->setUbezpieczenieZdrowotne($this->container->getParameter('s_ubez_zdro_1'));
                    $object->setUbezpieczenieZdrowotne2($this->container->getParameter('s_ubez_zdro_2'));
                    
                    $ubezpieczenieZdrowotne1 = round($kwotaPoPotraceniu * $object->getUbezpieczenieZdrowotne(), 2);
                    $ubezpieczenieZdrowotne2 = round($kwotaPoPotraceniu * $object->getUbezpieczenieZdrowotne2(), 2);
                    
                    $zdrowotne = 
                            $ubezpieczenieZdrowotne1 + 
                            $ubezpieczenieZdrowotne2
                            ;
                }
                
                
                $kwotaPoPotraceniu = $kwotaPoPotraceniu - $kosztUzyskaniaPrzychodu;
                
                //podatek dochodowy
                $object->setPodatekDochodowy($this->container->getParameter('podatek_dochodowy_1'));
                $podatekDochodowy = round($kwotaPoPotraceniu * $object->getPodatekDochodowy(), 2);
                
                $zaliczkaDoUs = $podatekDochodowy - $ubezpieczenieZdrowotne2;
                
                $kwotaNetto = $contract->getBrutto() -
                        (
                            $zaliczkaDoUs +
                            $zus +
                            $ubezpieczenieZdrowotne1
                        )
                        ;
                $object->setWyplataNetto(round($kwotaNetto, 2));   
                
############################################################################################                
            }
            elseif($contract->getTyp() == Contract::UMOWA_O_DZIELO)
            {
                $object->setTyp($contract->getTyp());
                $object->setBrutto($contract->getBrutto());
                $kosztUzyskaniaPrzychodu = round(($object->getBrutto() * $contract->getKosztUzyskaniaPrzychodu())/100, 2);
                $object->setKosztUzyskaniaPrzychodu($kosztUzyskaniaPrzychodu);
                $object->setPodatekDochodowy($this->container->getParameter('podatek_dochodowy_1'));
                
                $podatekDochodowy = round($object->getKosztUzyskaniaPrzychodu() * $object->getPodatekDochodowy(), 2);
                
                $object->setWyplataNetto(round($object->getBrutto() - $podatekDochodowy, 2)); 
                $object->setKosztPracodawcy($object->getBrutto());
            }
                $this->admin->create($object);
                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result' => 'ok',
                        'objectId' => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success','flash_create_success');
                // redirect to edit mode
                return new RedirectResponse($this->admin->generateUrl('list'));
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', 'flash_create_error');
                }
            } elseif ($this->isPreviewRequested()) {
                // pick the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'create',
            'form'   => $view,
            'object' => $object,
        ));
    }    
}