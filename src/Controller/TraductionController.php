<?php

namespace App\Controller;
use App\Entity\Traduction;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TraductionController extends AbstractController
{
    /**
     * @Route("/traduction", name="traduction")
     */
    public function index()
    {
        return $this->render('traduction/index.html.twig', [
            'controller_name' => 'TraductionController',
        ]);
    }
    
     /**    
     *  @Route("/wsTraduction", name="wsTraduction")    
     */   
    public function wsTraduction(Request $request)    
            {
        $em = $this->getDoctrine()->getManager(); 
        $repository = $em->getRepository(Theme::class);
        $fichiers = $repository->findAll(); 
        return $this->json($fichiers);   
        
        
            }
}
