<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 16/2/18
 * Time: 11:34.
 */

namespace App\Menu;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @param FactoryInterface $factory
     * @param EntityManager    $em
     */
    public function __construct(FactoryInterface $factory, EntityManager $em)
    {
        $this->factory = $factory;
        $this->categoryRepository = $em->getRepository('App:Category');
    }

    /**
     * @param RequestStack $requestStack
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'navbar-nav mr-auto');

        $productsItem = $menu->addChild(
            'Products',
            array(
                'route' => 'app_frontend_product_list',
                'label' => 'Products',
                'current' => 'app_frontend_product_list' == $requestStack->getCurrentRequest()->get('_route'),
                'class' => 'nav-item',
            )
        );

        $productsItem->setAttribute('class', 'nav-item');
        $productsItem->setLinkAttribute('class', 'nav-link');

        return $menu;
    }

    /**
     * @return \Knp\Menu\ItemInterface
     */
    public function createCategoriesMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav nav-pills');

        $categories = $this->categoryRepository->findAllSortedByName();

        /** @var Category $category */
        foreach ($categories as $category) {
            $productsItem = $menu->addChild(
                $category->getName(),
                array(
                    'route' => 'app_frontend_product_list',
                    'label' => $category->getName(),
//                    'current' => 'app_frontend_product_list' == $requestStack->getCurrentRequest()->get('_route'),
                    'class' => 'nav-item',
                )
            );
            $productsItem->setAttribute('class', 'nav-item');
            $productsItem->setLinkAttribute('class', 'nav-link');
        }

        return $menu;
    }
}
