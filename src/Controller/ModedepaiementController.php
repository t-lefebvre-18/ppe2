<?php

namespace App\Controller;
use App\Entity\Modedepaiement;
use App\Entity\Abonnement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ModedepaiementController extends AbstractController
{
    /**
     * @Route("/modedepaiement", name="modedepaiement")
     */
    public function index()
    {
        
          $repository = $this->getDoctrine()->getManager()->getRepository(Modedepaiement::class);
          
          
          $listeModedepaiement = $repository->findAll();
          
        return $this->render('modedepaiement/index.html.twig', [
            'controller_name' => 'ModedepaiementController',
            'listeModedepaiement' => $listeModedepaiement,
        ]);
    }
    
    
       /**
     * @Route("/modedepaiement_ajout", name="modeedepaiement_ajout")
     */
    public function ajout(Request $request)
    {
        $modedepaiement = new Modedepaiement();        
        $form = $this->createFormBuilder($modedepaiement)            
                ->add('libelle', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Ajouter'))            
                ->getForm();
        
        if ($request->isMethod('POST')){            
            $form -> handleRequest ($request);            
            if($form->isValid()){              
                $em = $this->getDoctrine()->getManager();              
                $em->persist($modedepaiement);              
                $em->flush();            
                
            } 
            
           } 
        
        return $this->render('modedepaiement/index.html.twig', array( 'form' => $form->createView(),));
    }
    
    
    
    
    
    
    
}
