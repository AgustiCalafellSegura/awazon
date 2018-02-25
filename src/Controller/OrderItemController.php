<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class OrderItemController extends Controller
{
    /**
     * @Route("/orderitem/list")
     */
    public function listing()
    {
        $orderitems = $this->getDoctrine()->getRepository('App:OrderItem')->findAll();
        return $this->render('orderItem/list.html.twig', array(
            'orderitems' => $orderitems,
        ));
    }
}