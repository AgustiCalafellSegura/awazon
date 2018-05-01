<?php

namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController.
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="app_frontend_homepage")
     */
    public function viewHomepage()
    {
        $qb = $this->getDoctrine()->getRepository('App:Product');

        $newproducts = $qb->findLastProductsAdded();
        $bestsellers = $qb->findBestSellersProducts();
        $mostrateds = $qb->findTopTenMostRatedProducts();

        return $this->render('frontend/homepage.html.twig', array(
            'products' => $newproducts,
            'bestsellers' => $bestsellers,
            'mostrateds' => $mostrateds,
        ));
    }

    /**
     * @Route("/credits", name="app_frontend_credits_page")
     */
    public function creditsPage()
    {
        return $this->render('frontend/credits.html.twig');
    }
}
