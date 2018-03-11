<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProductController
 * @Route("/admin")
 */
class ProductController extends Controller
{
    /**
     * @Route("/product/list", name="app_product_listing")
     */
    public function listing()
    {
        $products = $this->getDoctrine()->getRepository('App:Product')->findAllSortedByName();

        return $this->render('product/list.html.twig', array(
            'products' => $products,
        ));
    }
    /**
     * @Route("/product/create", name="app_product_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($product);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Product added successfully!');
            return $this->redirectToRoute('app_product_listing');
        }
        return $this->render('product/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/product/{id}/update", name="app_product_update")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, $id)
    {
        $product =$this->getDoctrine()->getRepository('App:Product')->find($id);
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Product updated successfully!');
            return $this->redirectToRoute('app_product_listing');
        }
        return $this->render('product/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/product/{id}/delete", name="app_product_delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $product = $this->getDoctrine()->getRepository('App:Product')->find($id);
        return $this->render('product/delete.html.twig', array(
            'product' => $product,
        ));
    }
    /**
     * @Route("/product/{id}/delete-confirm", name="app_product_deleteconfirm")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteConfirm($id)
    {
        $product = $this->getDoctrine()->getRepository('App:Product')->find($id);
        $this->getDoctrine()->getManager()->remove($product);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'Product deleted successfully!');
        return $this->redirectToRoute('app_product_listing');
    }
}