<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/category/list")
     *
     * @return Response
     */
    public function listing(){
        $categories = $this->getDoctrine()->getRepository('App:Category')->findAll();

        return $this->render(':category:list.html.twig', array(
            "categories" => $categories,
        ));
    }

}