<?php

namespace App\Controller\Frontend;

use App\Entity\Product;
use App\Form\ProductFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProductController.
 */
class ProductController extends Controller
{
    /**
     * @Route("/product/{slug}", name="app_frontend_product_detail")
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function productDetail($slug)
    {
        $product = $this->getDoctrine()->getRepository('App:Product')->findOneBy(array('slug' => $slug));

        if (is_null($product)) {
            throw new NotFoundHttpException();
        }

        $counter = $this->get('app.frequency_counter.manager')->getStarsFrequencyPercentile($product->getRatings());

        return $this->render('frontend/product/detail.html.twig', array(
            'product' => $product,
            'ratecounter' => $counter,
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

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $products = $this->getDoctrine()->getRepository('App:Product')->findByName($product->getName());
        } else {
            $products = $this->getDoctrine()->getRepository('App:Product')->findAll();
        }

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

    /**
     * @Route("/products/{slug}", name="app_frontend_products_category")
     *
     * @param Request $request
     * @param string  $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function productsCategory(Request $request, $slug)
    {
        $category = $this->getDoctrine()->getRepository('App:Category')->findOneBy(array('slug' => $slug));

        if (is_null($category)) {
            throw new NotFoundHttpException();
        }

        $product = new Product();
        $form = $this->createForm(ProductFormType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //TODO findProductsByCategoryAndName
            $products = $this->getDoctrine()->getRepository('App:Product')->findProductsByCategoryAndName($category, $product->getName());
        } else {
            $products = $this->getDoctrine()->getRepository('App:Product')->findProductsByCategory($category);
        }

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

    //TODO Create separate method.
//    public function formFilterByName(Request $request)
//    {
//        $product = new Product();
//        $form = $this->createForm(ProductFormType::class, $product);
//
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $products = $this->getDoctrine()->getRepository('App:Product')->findProductsByCategoryAndName($category, $product->getName());
//        } else {
//            $products = $this->getDoctrine()->getRepository('App:Product')->findProductsByCategory($category);
//        }
//
//        $paginator = $this->get('knp_paginator');
//        $pagination = $paginator->paginate(
//            $products, /* query NOT result */
//            $request->query->getInt('page', 1)/*page number*/,
//            8/*limit per page*/
//        );
//    }
}
