<?php

namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class HomepageController.
 */
class HomepageController extends Controller
{
    /**
     * @Route("/", name="app_frontend_homepage")
     */
    public function viewHomepage()
    {
        $products = $this->getDoctrine()->getRepository('App:Product')->findLastProductsAdded();

        return $this->render('frontend/homepage.html.twig', array(
            'products' => $products,
        ));
    }
}
