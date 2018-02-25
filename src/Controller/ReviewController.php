<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReviewController extends Controller
{
    /**
    * @Route("/review/list")
    */
    public function listing()
    {
        $reviews = $this->getDoctrine()->getRepository('App:Review')->findAll();
        return $this->render('review/list.html.twig', array(
            'reviews' => $reviews,
        ));
    }
}