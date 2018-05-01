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
     * @Route("/credits", name="app_frontend_credits")
     */
    public function creditsPage()
    {
        return $this->render('frontend/credits.html.twig');
    }

    /**
     * @Route("/privacy-policy", name="app_frontend_privacy_policy")
     */
    public function privacyPolicy()
    {
        return $this->render('frontend/privacy_policy.html.twig');
    }

    /**
     * @Route("/terms-of-service", name="app_frontend_terms_of_service")
     */
    public function termsOfService()
    {
        return $this->render('frontend/terms_of_service.html.twig');
    }
}
