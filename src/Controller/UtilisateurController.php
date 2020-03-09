<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/utilisateur", name="utilisateur")
     */
    public function index()
    {
        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function connexion()
    {
        return $this->render('utilisateur/inscription.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function inscription()
    {
        return $this->render('utilisateur/connexion.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }
}
