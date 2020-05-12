<?php 
// src/Controller/WelcomeController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController{
    
    /**
     * @Route("/Welcome")
     */

     public function Welcome()
    {
        $Date = [
            'month' => date("F"),
            'number' => date ("d"),
            'day' => date ("D")
        ];


        return $this->render('base.html.twig', [
            'date' => $Date,
        ]);
    }
}
