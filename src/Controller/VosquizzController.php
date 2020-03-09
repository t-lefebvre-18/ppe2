<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VosquizzController extends AbstractController
{
    /**
     * @Route("/vosquizz", name="vosquizz")
     */
    public function index()
    {
        return $this->render('vosquizz/index.html.twig', [
            'controller_name' => 'VosquizzController',
        ]);
    }
}
