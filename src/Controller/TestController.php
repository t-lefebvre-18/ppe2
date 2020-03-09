<?php

namespace App\Controller;

use App\Entity\Test;
use App\Entity\Theme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(Test::class);
        
        $listeTest = $repository->findAll();
        
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'listeTest' => $listeTest,
        ]);
    }
    
    
    /**
     * @Route("/test_ajout", name="test_ajout")
     */
    public function ajout(Request $request)
    {
        $test = new Test();        
        $form = $this->createFormBuilder($test)            
                ->add('niveaux', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Ajouter'))            
                ->getForm();
        
        if ($request->isMethod('POST')){            
            $form -> handleRequest ($request);            
            if($form->isValid()){              
                $em = $this->getDoctrine()->getManager();              
                $em->persist($test);              
                $em->flush();            
                
            } 
            
           }
       
           
              $repository = $this->getDoctrine()->getManager()->getRepository(Theme::class);
        
        $listet = $repository->findAll();
        return $this->render('test/admin_test_ajout.html.twig', array( 'form' => $form->createView(),
            'listet' => $listet, ));
    }
    
    
    
    
    
    
    
    
    
}
