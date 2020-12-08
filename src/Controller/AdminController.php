<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController{
    /**
     * @Route("/", name="app_index")
     */
    public function indexAction(){
        return $this->render('admin/index.html.twig');
    }
}