<?php

namespace App\Controller\Asl;

use App\Entity\Asl\Association;
use App\Entity\Exploc\Dossiere;
use App\Entity\Main\Test;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AslController extends AbstractController
{    
    /**
     * @Route("/asl", name="asl")
     */
    public function index(): Response
    {   
        $em = $this->getDoctrine()->getManager('asl');
        $test = new Association();
        $test->setNom('bonjour');

        $emExploc =  $this->getDoctrine()->getManager('exploc');
        $dossier = new Dossiere();
        $dossier->setNom('lalaal');


        $emdefault = $this->getDoctrine()->getManager();
        $test2 = new Test();
        $test2->setTest('brerzerze');


        $em->persist($test);
        $em->flush();


        $emdefault->persist($test2);
        $emdefault->flush();

        $emExploc->persist($dossier);
        $emExploc->flush();

        return $this->render('asl/index.html.twig', [
            'controller_name' => 'AslController',
        ]);
    }
}
