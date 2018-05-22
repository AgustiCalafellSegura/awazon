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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showCart()
    {
        $session = $this->get('session');

        if (!$session->has('cart')) {
            $cart = new Cart();
        } else {
            $cart = $session->get('cart');
        }

        return $this->render('frontend/cart/list.html.twig', array(
            'cart' => $cart,
        ));
    }

    /**
     * @Route("/cart/counter", name="app_frontend_cart_counter")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function cartCounter()
    {
        $session = $this->get('session');

        if ($session->has('cart')) {
            /** @var Cart $cart */
            $cart = $session->get('cart');
            $counter = count($cart->getItems());
        } else {
            $counter = 0;
        }

        return $this->render('frontend/cart/counter.html.twig', array(
            'counter' => $counter,
        ));
    }
}
