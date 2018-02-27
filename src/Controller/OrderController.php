<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends Controller
{
    /**
     * @Route("/order")
     */
    public function listing()
    {
        $orders = $this->getDoctrine()->getRepository('App:Order')->findAll();
        return $this->render('order/list.html.twig', array(
            'orders' => $orders,
        ));
    }
    /**
     * @Route("/order/create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $order = new Order();
        $form = $this->createForm(OrderFormType::class, $order);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($order);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Order added successfully!');
            return $this->redirectToRoute('app_order_listing');
        }
        return $this->render('order/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/order/{id}/update")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, $id)
    {
        $order =$this->getDoctrine()->getRepository('App:Order')->findOneBy(array('id'=>$id));
        $form = $this->createForm(OrderFormType::class, $order);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Order updated successfully!');
            return $this->redirectToRoute('app_order_listing');
        }
        return $this->render('order/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/order/{id}/delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $order = $this->getDoctrine()->getRepository('App:Order')->findOneBy(array('id'=>$id));
        return $this->render('order/delete.html.twig', array(
            'order' => $order,
        ));
    }
    /**
     * @Route("/order/{id}/delete-confirm")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteConfirm($id)
    {
        $order = $this->getDoctrine()->getRepository('App:Order')->findOneBy(array('id'=>$id));
        $this->getDoctrine()->getManager()->remove($order);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'Order deleted successfully!');
        return $this->redirectToRoute('app_order_listing');
    }
}