<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 15:58
 */

namespace App\Controller\Backend;

use App\Entity\Category;
use App\Form\CategoryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @Route("/admin")
 */
class CategoryController extends Controller
{
    /**
     * @Route("/category/list", name="app_category_listing")
     *
     * @return Response
     */
    public function listing()
    {
        $categories = $this->getDoctrine()->getRepository('App:Category')->findAllSortedByName();

        return $this->render('category/list.html.twig', array(
            "categories" => $categories,
        ));
    }

    /**
     * @Route("/category/create")
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryFormType::class, $category);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($category);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'La categoria '.$category->getName().' s\'ha guardat correctament');

            return $this->redirectToRoute('app_category_listing');
        }

        return $this->render('category/create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/category/{id}/update")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, $id)
    {
        $category =$this->getDoctrine()->getRepository('App:Category')->find($id);
        $form = $this->createForm(CategoryFormType::class, $category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Category updated successfully!');
            return $this->redirectToRoute('app_category_listing');
        }
        return $this->render('category/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/category/{id}/delete")
     */
    public function delete($id)
    {
        $category = $this->getDoctrine()->getRepository('App:Category')->find($id);
        return $this->render('category/delete.html.twig', array(
            'category' => $category,
        ));
    }
    /**
     * @Route("/category/{id}/delete-confirm")
     */
    public function deleteConfirm($id)
    {
        $category = $this->getDoctrine()->getRepository('App:Category')->find($id);
        $this->getDoctrine()->getManager()->remove($category);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'Category deleted successfully!');
        return $this->redirectToRoute('app_category_listing');
    }
}