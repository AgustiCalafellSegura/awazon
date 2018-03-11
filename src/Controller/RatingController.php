<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use App\Entity\Provider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class RatingController
 * @Route("/admin")
 */
class RatingController extends Controller
{
    /**
     * @Route("/rating/list", name="app_rating_listing")
     */
    public function listing()
    {
        $ratings = $this->getDoctrine()->getRepository('App:Rating')->findAll();
        return $this->render('rating/list.html.twig', array(
            'ratings' => $ratings,
        ));
    }
}