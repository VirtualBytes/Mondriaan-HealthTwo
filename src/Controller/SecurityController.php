<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController {

    /**
     * @Route("/login", name="login")
     */
    public function loginAction() {
        return $this->render('medewerker/login.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction() {
        return $this->render('index.html.twig');
    }
}