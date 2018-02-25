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

class RatingController extends Controller
{
    /**
     * @Route("/rating/list")
     */
    public function listing()
    {
        $ratings = $this->getDoctrine()->getRepository('App:Rating')->findAll();
        return $this->render('rating/list.html.twig', array(
            'ratings' => $ratings,
        ));
    }
}