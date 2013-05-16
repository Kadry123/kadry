<?php

namespace Kadry\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kadry\PaymentBundle\Entity\Contract;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AdminContractController extends CRUDController
{
    /**
     * return the Response object associated to the edit action
     *
     *
     * @param mixed $id
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return Response
     */
    public function editAction($id = null)
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        $id = $this->get('request')->get($this->admin->getIdParameter());

        $object = $this->admin->getObject($id);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        if (false === $this->admin->isGranted('EDIT', $object)) {
            throw new AccessDeniedException();
        }
        

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
#############################################################################################                
                $object->setUEmerytalnePercent($this->container->getParameter('s_emerytalna'));
                $object->setURentowePercent($this->container->getParameter('s_rentowa'));
                $object->setUChorobowePercent($this->container->getParameter('s_chorobowa'));
                
                $ubezSpolSum = 
                        $object->getPlacaZasadnicza() + 
                        $object->getStaleDodatki() +
                        $object->getPremia() +
                        $object->getProwizja() +
                        $object->getAkord()
                        ;
echo "ubezpieczenie spoleczne razem " . $ubezSpolSum . '<br />';
                $wynNieskladkowe = 
                        $object->getZaCzasChoroby() +
                        $object->getInneNs()
                        ;
                
echo "wynagrodzenia nieskladkowe " . $wynNieskladkowe . '<br />';
                $zasilki = 
                        $object->getZChorobowy() +
                        $object->getZOpiekunczy() +
                        $object->getZMacierzynski()
                        ;
echo "zasilki " . $zasilki . '<br />';
                
                $przychodyBrutto = 
                        $ubezSpolSum +
                        $wynNieskladkowe +
                        $zasilki
                        ;

echo "suma dodatk " . $ubezSpolSum . '<br />';
                $ogranPdstSklSpol = $ubezSpolSum;
                
                $podstawaWymiaruSkladekSpolecznych = $ogranPdstSklSpol;
                if($ogranPdstSklSpol > $this->container->getParameter('max_kwota_wymiaru_skladek_spolecznych'))
                {
                    $podstawaWymiaruSkladekSpolecznych = 0;
                }
                /*
                 * @todo:
                 * zaokragic do dwoch miejsc po przecinku
                 */
                $object->setUEmerytalne($podstawaWymiaruSkladekSpolecznych * $object->getUEmerytalnePercent());
                $object->setURentowe($podstawaWymiaruSkladekSpolecznych * $object->getURentowePercent());
                $object->setUChorobowe($ogranPdstSklSpol * $object->getUChorobowePercent());

                $sumaSkladek = 
                        round($object->getUEmerytalne(), 2) +
                        round($object->getURentowe(), 2) +
                        round($object->getUChorobowe(), 2)
                        ;
echo "suma skladek " . $sumaSkladek . '<br />';                
                
                //Podstawa wymiaru skladki zdrowotnej
                $pdstWymSklZdrow = 
                        $ubezSpolSum + 
                        $object->getZaCzasChoroby() -
                        $sumaSkladek
                        ;
                
                //////////////////
                
                $podstawaOpodatkowania =
                        round(
                            $przychodyBrutto - 
                            $sumaSkladek - 
                            $object->getKosztUzyskaniaPrzychodu()
                        , 2)
                        ;
                
                /*
                 * @todo 
                 * suma wypłat w danym roku i tu policzyc podatek
                 */
//                if($podstawaOpodatkowania > )
                
                //////////////////
                $x = round($podstawaOpodatkowania * $object->getStopaProcentowaPodatku(), 2);
                $y = round($x - $object->getUlgaPodatkowa(), 2);
                
//                Składka na ubezpieczenie zdrowotne 9
                $snuz1 = round($pdstWymSklZdrow * $this->container->getParameter('s_ubez_zdro_1'), 2);
                $snuz2 = round($pdstWymSklZdrow * $this->container->getParameter('s_ubez_zdro_2'), 2);
                
                $tf = 0;
                if($y > 0)
                {
                    $tf = $y;
                }
                
                if($snuz2 < $tf)
                {
                    $object->setSnuz2($snuz2);
                }
                elseif($snuz2 > $tf)
                {
                    $object->setSnuz2($tf);
                }
                else
                {
                    $object->setSnuz2(0);
                }
                
                if($tf > $object->getSnuz2() && $tf < $snuz1)
                {
                    $object->setSnuz1($tf);
                }
                elseif($snuz2 == $object->getSnuz2())
                {
                    $object->setSnuz1($snuz1);
                }
                elseif($object->getSnuz2() == $tf)
                {
                    $object->setSnuz1($object->getSnuz2());
                }
                else
                {
                    $object->setSnuz1(0);
                }
                
                $t = $x - $object->getUlgaPodatkowa() - $object->getSnuz2();
                
                $u = 0;
                if($t > 0)
                {
                    $u = $t;
                }
                
                $u = round($u, 2);
                
                $wynagrodzenieNetto = 
                        $przychodyBrutto -
                        $sumaSkladek - 
                        $object->getSnuz1() -
                        $u
                        ;
                
                $innePotracenia = 
                        $object->getUbezpieczenieGrupowe()+
                        $object->getKzp() +
                        $object->getKomornik()
                        ;
                
                echo $doWypłaty = $wynagrodzenieNetto - $innePotracenia;
                die;
                
#############################################################################################                
                $this->admin->update($object);
                $this->addFlash('sonata_flash_success', 'flash_edit_success');

                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result'    => 'ok',
                        'objectId'  => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', 'flash_edit_error');
                }
            } elseif ($this->isPreviewRequested()) {
                // enable the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'edit',
            'form'   => $view,
            'object' => $object,
        ));
    }
}
