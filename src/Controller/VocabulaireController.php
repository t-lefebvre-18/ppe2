<?php

namespace App\Controller;
use App\Entity\Vocabulaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VocabulaireController extends AbstractController
{
    /**
     * @Route("/vocabulaire", name="vocabulaire")
     */
    
    public function index()
    {
        
        $repository = $this->getDoctrine()->getManager()->getRepository(Vocabulaire::class);
        
        $listeVocabulaire = $repository->findAll();
        
        
        return $this->render('vocabulaire/index.html.twig', [
            'controller_name' => 'VocabulaireController',
            'listeVocabulaire' => $listeVocabulaire ,
            
        ]);
    }
    
    /**
     * @Route("/vocabulaire_ajout", name="vocabulaire_ajout")
     */
    public function ajout(Request $request)
    {
        $vocabulaire = new Vocabulaire();        
        $form = $this->createFormBuilder($vocabulaire)            
                ->add('libelle', TextType::class)
                ->add('categorie', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Ajouter'))            
                ->getForm();
        
        if ($request->isMethod('POST')){            
            $form -> handleRequest ($request);            
            if($form->isValid()){              
                $em = $this->getDoctrine()->getManager();              
                $em->persist($vocabulaire);              
                $em->flush();            
                
            } 
            
           } 
        
        return $this->render('vocabulaire/index.html.twig', array( 'form' => $form->createView(),));
    }
    
    
    
    
    
    
    
    
}
