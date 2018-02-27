<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use App\Entity\Provider;
use App\Form\ProviderFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProviderController extends Controller
{
    /**
     * @Route("/provider")
     */
    public function listing()
    {
        $providers = $this->getDoctrine()->getRepository('App:Provider')->findAll();
        return $this->render('provider/list.html.twig', array(
            'providers' => $providers,
        ));
    }
    /**
     * @Route("/provider/create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $provider = new Provider();
        $form = $this->createForm(ProviderFormType::class, $provider);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($provider);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Provider added successfully!');
            return $this->redirectToRoute('app_provider_listing');
        }
        return $this->render('provider/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/provider/{id}/update")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, $id)
    {
        $provider =$this->getDoctrine()->getRepository('App:Provider')->find($id);
        $form = $this->createForm(ProviderFormType::class, $provider);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Provider updated successfully!');
            return $this->redirectToRoute('app_provider_listing');
        }
        return $this->render('provider/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/provider/{id}/delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $provider = $this->getDoctrine()->getRepository('App:Provider')->find($id);
        return $this->render('provider/delete.html.twig', array(
            'provider' => $provider,
        ));
    }
    /**
     * @Route("/provider/{id}/delete-confirm")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteConfirm($id)
    {
        $provider = $this->getDoctrine()->getRepository('App:Provider')->find($id);
        $this->getDoctrine()->getManager()->remove($provider);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'Provider deleted successfully!');
        return $this->redirectToRoute('app_provider_listing');
    }
}