<?php

namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


    /**
     * @Route("/", name="app_frontend_homepage")
     */
class HomepageController extends Controller
{

    public function dashboard()
    {
        $products = $this->getDoctrine()->getRepository('App:Product')->findLastProductsAdded();

        return $this->render('frontend/homepage.html.twig', array(
            "products" => $products,
        ));
    }
}
}
