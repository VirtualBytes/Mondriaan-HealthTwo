<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BezoekerController extends AbstractController{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(){
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/patienten", name="patienten")
     */
    public function patientenAction(){
        return $this->render('security/login.html.twig');
    }

     /**
     * @Route("/apotheken", name="apotheken")
     */
    public function apothekenAction(){
        return $this->render('security/login.html.twig');
    }
        
    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(){
        return $this->render('security/login.html.twig');
    }
}