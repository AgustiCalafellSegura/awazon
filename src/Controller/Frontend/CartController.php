<?php

namespace App\Controller\Frontend;

use App\Entity\Cart;
use App\Entity\CartItem;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class CartController.
 */
class CartController extends Controller
{
    /**
     * @Route("/cart/add-product/{id}", name="app_frontend_cart_add_product")
     *
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addProduct($id)
    {
        $product = $this->getDoctrine()->getRepository('App:Product')->find($id);

        if (!$product) {
            throw new AccessDeniedException();
        }

        $item = new CartItem();
        $item
            ->setUnits(1)
            ->setProduct($product);

        $cart = new Cart();

        $cart->addItem($item);

        $session = $this->get('session');
        $session->set('cart', $cart);

        return $this->redirectToRoute('app_frontend_product_list');
    }
}
