<?php

namespace App\Controller;

use App\Entity\Abonement;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AbonementController extends AbstractController
{
    /**
     * @Route("/abonement", name="abonement")
     */
    public function index()
    {
        
        $repository = $this->getDoctrine()->getManager()->getRepository(Abonement::class);
        
        $listeAbonement = $repository->findAll();
        
        return $this->render('abonement/index.html.twig', [
            'controller_name' => 'AbonementController',
            'listeAbonement' => $listeAbonement,
        ]);
    }
    
       /**
     * @Route("/abonement_ajout", name="abonement_ajout")
     */
    public function ajout(Request $request)
    {
        $abonement = new Abonement();        
        $form = $this->createFormBuilder($abonement)            
                ->add('libelle', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Ajouter'))            
                ->getForm();
        
      if ($request->isMethod('POST')){            
            $form -> handleRequest ($request);            
            if($form->isValid()){              
                $em = $this->getDoctrine()->getManager();              
                $em->persist($abonement);              
                $em->flush();            
                
            } 
            
           }
        
        return $this->render('abonement/admin_abonement_ajout.html.twig', array( 'form' => $form->createView(),));
    }
    
    
    
    
}
