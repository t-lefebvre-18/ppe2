<?php

namespace App\Controller;

use App\Entity\Entreprise;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function index()
    {
      
        $repository = $this->getDoctrine()->getManager()->getRepository(Entreprise::class);
        
        $listeEntreprise = $repository->findAll();
        
        return $this->render('entreprise/index.html.twig', [
            'controller_name' => 'EntrepriseController',
            'listeEntreprise' => $listeEntreprise,
        ]);
    }
    
   
     /**
     * @Route("/entreprise_ajout", name="entreprise_ajout")
     */
    public function ajout(Request $request)
    {
        $entreprise = new Entreprise();        
        $form = $this->createFormBuilder($entreprise)            
                ->add('libelle', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Ajouter'))            
                ->getForm();
        
        if ($request->isMethod('POST')){            
            $form -> handleRequest ($request);            
            if($form->isValid()){              
                $em = $this->getDoctrine()->getManager();              
                $em->persist($entreprise);              
                $em->flush();            
                
            } 
            
           }
        
        return $this->render('entreprise/index.html.twig', array( 'form' => $form->createView(),));
    }    
}




 



