<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CustomerController extends Controller
{
    /**
     * @Route("/customer")
     */
    public function listing()
    {
        $customers = $this->getDoctrine()->getRepository('App:Customer')->findAllSortedByName();

        return $this->render('customer/list.html.twig', array(
            'customers' => $customers,
        ));
    }
    /**
     * @Route("/customer/create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $customer = new Customer();
        $form = $this->createForm(CustomerFormType::class, $customer);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($customer);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Customer added successfully!');
            return $this->redirectToRoute('app_customer_listing');
        }
        return $this->render('customer/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/customer/{id}/update")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, $id)
    {
        $customer =$this->getDoctrine()->getRepository('App:Customer')->find($id);
        $form = $this->createForm(CustomerFormType::class, $customer);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Customer updated successfully!');
            return $this->redirectToRoute('app_customer_listing');
        }
        return $this->render('customer/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/customer/{id}/delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $customer = $this->getDoctrine()->getRepository('App:Customer')->find($id);
        return $this->render('customer/delete.html.twig', array(
            'customer' => $customer,
        ));
    }
    /**
     * @Route("/customer/{id}/delete-confirm")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteConfirm($id)
    {
        $customer = $this->getDoctrine()->getRepository('App:Customer')->find($id);
        $this->getDoctrine()->getManager()->remove($customer);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'Customer deleted successfully!');
        return $this->redirectToRoute('app_customer_listing');
    }
}