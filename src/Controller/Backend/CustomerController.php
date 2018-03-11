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

/**
 * Class CustomerController
 * @Route("/admin")
 */
class CustomerController extends Controller
{
    /**
     * @Route("/customer/list", name="app_customer_listing")
     */
    public function listing()
    {
        $customers = $this->getDoctrine()->getRepository('App:Customer')->findAllSortedByName();

        return $this->render('backend/customer/list.html.twig', array(
            'customers' => $customers,
        ));
    }
    /**
     * @Route("/customer/create", name="app_customer_create")
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
        return $this->render('backend/customer/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/customer/{id}/update", name="app_customer_update")
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
        return $this->render('backend/customer/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/customer/{id}/delete", name="app_customer_delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $customer = $this->getDoctrine()->getRepository('App:Customer')->find($id);
        return $this->render('backend/customer/delete.html.twig', array(
            'customer' => $customer,
        ));
    }
    /**
     * @Route("/customer/{id}/delete-confirm", name="app_customer_deleteconfirm")
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