<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller\Backend;

use App\Entity\Provider;
use App\Form\ProviderFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProviderController
 * @Route("/admin")
 */
class ProviderController extends Controller
{
    /**
     * @Route("/provider/list", name="app_provider_listing")
     */
    public function listing()
    {
        $providers = $this->getDoctrine()->getRepository('App:Provider')->findAll();
        return $this->render('backend/provider/list.html.twig', array(
            'providers' => $providers,
        ));
    }
    /**
     * @Route("/provider/create", name="app_provider_create")
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
        return $this->render('backend/provider/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/provider/{id}/update", name="app_provider_update")
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
        return $this->render('backend/provider/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/provider/{id}/delete", name="app_provider_delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $provider = $this->getDoctrine()->getRepository('App:Provider')->find($id);
        return $this->render('backend/provider/delete.html.twig', array(
            'provider' => $provider,
        ));
    }
    /**
     * @Route("/provider/{id}/delete-confirm", name="app_provider_deleteconfirm")
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