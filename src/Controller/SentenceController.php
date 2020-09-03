<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Word;
use App\Entity\Sentences;

class SentenceController extends AbstractController
{

    /**
     * @Route(path="/", name="main_page", methods={"GET", "POST"})
    */
    public function index(Request $request)
    {
        //Fetching and generating sentence

        $gimine = (rand(1,2) == 1) ? 'm' : 'w';

        $jaustukai = $this->returnWords(4, null);
        $ivardziai = $this->returnWords(3,  array(null, $gimine));
        $budvardziai = $this->returnWords(2,  $gimine);
        $daiktavardziai =$this->returnWords(1,  $gimine);

        shuffle($jaustukai);
        shuffle($ivardziai);
        shuffle($budvardziai);
        shuffle($daiktavardziai);

        $sentence = ucfirst($jaustukai[0]->getText()). ' ' . $ivardziai[0]->getText(). ' ';

        for ($i=0; $i < rand(1,3); $i++) { 
            $sentence .= $budvardziai[$i]->getText(). ', ';
        }

        $sentence .= $daiktavardziai[0]->getText();


        //New sentence and Form creation

        $form_sentence = new Sentences();

        $form = $this->createFormBuilder($form_sentence)
                    ->add('url', TextType::class, array('attr' => array('class' => 'form-control')))
                    ->add('text', HiddenType::class, array(
                        'data' => $sentence
                    ))
                    ->add('save', SubmitType::class, array(
                        'label' => 'Save sentence',
                        'attr' => array('class' => 'btn btn-primary btn-block btn-sm mt-3')
                    ))
                    ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $form_sentence = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($form_sentence);
            $em->flush();

            return $this->redirectToRoute('main_page');
        }


        return $this->render('Sentences/index.html.twig', array('sentence' => $sentence, 'form' => $form->createView()));
    }

    /**
     * @Route("/{url}", name="sentence_show", methods={"GET"})
     */
    public function show($url) {
        
        $sentence = $this->getDoctrine()->getRepository(Sentences::class)->findOneBy([
            'url' => $url
        ]);

        if (!$sentence) {
            throw $this->createNotFoundException('The sentence url does not exist');
        }

        return $this->render('Sentences/show.html.twig', array('sentence' => $sentence->getText()));
    }



    //Query for returning words my relation and language_part
    public function returnWords($language_part, $relation){

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Word::class);

        if(!$relation){
            return $repo->findBy([
                'language_part' => $language_part,
            ]);
        }
        else{
            return $repo->findBy([
                'language_part' => $language_part,
                'relation' => $relation
            ]);
        }

    }
    

}