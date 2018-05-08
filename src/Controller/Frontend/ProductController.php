<?php

namespace App\Controller\Frontend;

use App\Entity\Product;
use App\Entity\Rating;
use App\Form\ProductFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProductController.
 */
class ProductController extends Controller
{
    /**
     * @Route("/product/{slug}", name="app_frontend_product_detail")
     */
    public function productDetail($slug)
    {
        $product = $this->getDoctrine()->getRepository('App:Product')->findOneBy(array('slug' => $slug));

        $counter1 = 0;
        $counter2 = 0;
        $counter3 = 0;
        $counter4 = 0;
        $counter5 = 0;
        $totalRatings = count($product->getRatings());

        /** @var Rating $rate */
        foreach ($product->getRatings() as $rate) {
            if (1 == $rate->getRate()) {
                ++$counter1;
            } elseif (2 == $rate->getRate()) {
                ++$counter2;
            } elseif (3 == $rate->getRate()) {
                ++$counter3;
            } elseif (4 == $rate->getRate()) {
                ++$counter4;
            } elseif (5 == $rate->getRate()) {
                ++$counter5;
            }
        }

        if ($totalRatings > 0) {
            $counter1 = (($counter1 * 100) / $totalRatings);
            $counter2 = (($counter2 * 100) / $totalRatings);
            $counter3 = (($counter3 * 100) / $totalRatings);
            $counter4 = (($counter4 * 100) / $totalRatings);
            $counter5 = (($counter5 * 100) / $totalRatings);
        }

        return $this->render('frontend/product/detail.html.twig', array(
            'product' => $product,
            'ratecounter' => array($counter1, $counter2, $counter3, $counter4, $counter5),
        ));
    }

    /**
     * @Route("/products", name="app_frontend_product_list")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function productsList(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductFormType::class, $product);

        $products = $this->getDoctrine()->getRepository('App:Product')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $products, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            8/*limit per page*/
        );

        return $this->render('frontend/product/list.html.twig', array(
            'pagination' => $pagination,
            'form' => $form->createView(),
        ));
    }
}
