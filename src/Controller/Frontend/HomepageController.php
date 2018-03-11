<?php

namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route("/")
     */
    public function viewHomepage ()
    {
        return $this->render('frontend/homepageView.html.twig');
    }
}