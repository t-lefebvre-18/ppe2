<?php

namespace App\Controller;
use App\Entity\Theme;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ThemeController extends AbstractController
{
    /**
     * @Route("/themequizz", name="themequizz")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(Theme::class);
        
        $listeThemes = $repository->findAll();
        
        return $this->render('theme/index.html.twig', [
            'controller_name' => 'ThemeController',
            'listeThemes' => $listeThemes,
        ]);
    }
    
   
    /**    
      * @Route("/theme_ajout", name="theme_ajout")  
     */   
    public function ajout(Request $request){  
        $utilisateur = new Utilisateur();     
        $form = $this->createFormBuilder($utilisateur)       
                ->add('nom', TextType::class)
                ->add('prenom', TextType::class)    
                ->add('email', TextType::class)        
                ->add('mdp', DateType::class)         
                ->add('save', SubmitType::class, array('label' => 'Ajouter'))        
                ->getForm();    
        return $this->render('utilisateur/ajout.html.twig', array(          
            'form' => $form->createView(),     
            ));  
        
        if ($request->isMethod('POST')){            
            $form -> handleRequest ($request);            
            if($form->isValid()){              
                $em = $this->getDoctrine()->getManager();              
                $em->persist($theme);              
                $em->flush();            
                
            } 
            
           }
       
           
              $repository = $this->getDoctrine()->getManager()->getRepository(Theme::class);
        
        $listet = $repository->findAll();
        return $this->render('test/admin_theme_ajout.html.twig', array( 'form' => $form->createView(),
            'listet' => $listet, ));
        
        
    }
    
    
       /**
     * @Route("/entreprise_modif", name="entreprise_modif")
     */
     public function modifier(Request $request)    {   
      $repository = $this->getDoctrine()->getManager()->getRepository(Theme::class); 
      
      $theme = $repository->find($request->get('id'));  
      
      $form = $this->createFormBuilder($theme)         
              ->add('nom', TextType::class)
              ->add('prenom', TextType::class)    
              ->add('email', TextType::class)        
              ->add('mdp', DateType::class)          
              ->add('save', SubmitType::class, array('label' => 'Modifier'))      
              ->getForm();      
      
      if ($request->isMethod('POST')){         
                  $form -> handleRequest ($request);         
                  if($form->isValid()){          
                      $em = $this->getDoctrine()->getManager();      
                      $em->persist($theme);           
                      $em->flush();       
                      }     
                      
                  }       
                      return $this->render('utilisateur/admin_theme_modif.html.twig', ['form'=>$form->createView()]);   
                      }
   
    
    
    
    
    
    
    
}
