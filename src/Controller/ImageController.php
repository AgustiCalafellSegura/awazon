<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller;

use App\Form\ImageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Image;

class ImageController extends Controller
{
    /**
     * @Route("/image/list")
     */
    public function listing()
    {
        $images = $this->getDoctrine()->getRepository('App:Image')->findAll();
        return $this->render('image/list.html.twig', array(
            'images' => $images,
        ));
    }
    /**
     * @Route("/image/create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $image = new Image();
        $form = $this->createForm(ImageFormType::class, $image);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($image);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Image added successfully!');
            return $this->redirectToRoute('app_image_listing');
        }
        return $this->render('image/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/image/{id}/update")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, $id)
    {
        $image =$this->getDoctrine()->getRepository('App:Image')->findOneBy(array('id'=>$id));
        $form = $this->createForm(ImageFormType::class, $image);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Image updated successfully!');
            return $this->redirectToRoute('app_image_listing');
        }
        return $this->render('image/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/image/{id}/delete")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $image = $this->getDoctrine()->getRepository('App:Image')->findOneBy(array('id'=>$id));
        return $this->render('image/delete.html.twig', array(
            'image' => $image,
        ));
    }
    /**
     * @Route("/image/{id}/delete-confirm")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteConfirm($id)
    {
        $image = $this->getDoctrine()->getRepository('App:Image')->findOneBy(array('id'=>$id));
        $this->getDoctrine()->getManager()->remove($image);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'Image deleted successfully!');
        return $this->redirectToRoute('app_image_listing');
    }
}