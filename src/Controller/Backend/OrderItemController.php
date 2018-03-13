<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class OrderItemController
 * @Route("/admin")
 */
class OrderItemController extends Controller
{
    /**
     * @Route("/orderitem/list", name="app_orderitem_listing")
     */
    public function listing()
    {
        $orderitems = $this->getDoctrine()->getRepository('App:OrderItem')->findAll();
        return $this->render('backend/orderItem/list.html.twig', array(
            'orderitems' => $orderitems,
        ));
    }
}