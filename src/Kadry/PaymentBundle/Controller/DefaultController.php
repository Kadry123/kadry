<?php

namespace Kadry\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KadryPaymentBundle:Default:index.html.twig', array('name' => $name));
    }
}
