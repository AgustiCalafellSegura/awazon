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
     * @Route("/")
     */
    public function viewHomepage()
    {
        return $this->render('frontend/homepageView.html.twig');
    }
}
