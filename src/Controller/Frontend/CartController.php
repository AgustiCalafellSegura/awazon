<?php

namespace App\Controller\Frontend;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class CartController.
 */
class CartController extends Controller
{
    /**
     * @Route("/cart/add-product/{id}", name="app_frontend_cart_add_product")
     */
    public function addProduct($id)
    {
        return $this->redirectToRoute('app_frontend_product_list');
    }
}
