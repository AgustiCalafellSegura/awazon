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

/**
 * Class OrderController
 * @Route("/admin")
 */
class OrderController extends Controller
{
    /**
     * @Route("/order/list", name="app_order_listing")
     */
    public function listing()
    {
        $orders = $this->getDoctrine()->getRepository('App:Order')->findAllSortedByName();

        return $this->render('backend/order/list.html.twig', array(
            'orders' => $orders,
        ));
    }
    /**
     * @Route("/order/create", name="app_order_create")
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
        return $this->render('backend/order/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/order/{id}/update", name="app_order_update")
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
        return $this->render('backend/order/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/order/{id}/delete", name="app_order_delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $order = $this->getDoctrine()->getRepository('App:Order')->findOneBy(array('id'=>$id));
        return $this->render('backend/order/delete.html.twig', array(
            'order' => $order,
        ));
    }
    /**
     * @Route("/order/{id}/delete-confirm", name="app_order_deleteconfirm")
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