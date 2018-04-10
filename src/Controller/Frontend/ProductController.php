<?php

namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProductController.
 */
class ProductController extends Controller
{
    /**
     * @Route("/product/{slug}", name="app_frontend_product_detail")
     */
    public function productDetail($slug)
    {
        $product = $this->getDoctrine()->getRepository('App:Product')->findOneBy(array('slug' => $slug));

        return $this->render('frontend/product/detail.html.twig', array(
            'product' => $product,
        ));
    }
}
