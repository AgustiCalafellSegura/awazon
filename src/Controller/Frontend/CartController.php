<?php

namespace App\Controller\Frontend;

use App\Entity\Cart;
use App\Entity\CartItem;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
            ->setProduct($product)
        ;

        $session = $this->get('session');
        if (!$session->has('cart')) {
            $cart = new Cart();
        } else {
            $cart = $session->get('cart');
        }

        $cart->addItem($item);

        $session->set('cart', $cart);

        return $this->redirectToRoute('app_frontend_product_list');
    }

    /**
     * @Route("/cart", name="app_frontend_cart")
     *
     * @param SessionInterface $session
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showCart(SessionInterface $session)
    {
        return $this->render('frontend/product/cart.html.twig', array(
            'session' => $session,
        ));
    }
}
