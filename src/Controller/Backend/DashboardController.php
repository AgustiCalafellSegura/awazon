<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 6/03/18
 * Time: 16:15
 */

namespace App\Controller\Backend;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DashboardController
 * @Route("/admin")
 */
class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="app_backend_dashboard")
     *
     * @return Response
     */
    public function dashboard()
    {
        $products = $this->getDoctrine()->getRepository('App:Product')->findTopTenMostRatedProducts();
        $customers = $this->getDoctrine()->getRepository('App:Customer')->findBestCustomers();

        return $this->render('dashboard.html.twig',
            array(
                "products" => $products,
                "customers" => $customers,
            )
        );
    }
}