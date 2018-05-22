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
use Symfony\Component\Routing\RouterInterface;

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
     * @var RouterInterface
     */
    private $router;

    /**
     * @param FactoryInterface $factory
     * @param EntityManager    $em
     * @param RouterInterface  $router
     */
    public function __construct(FactoryInterface $factory, EntityManager $em, RouterInterface $router)
    {
        $this->factory = $factory;
        $this->categoryRepository = $em->getRepository('App:Category');
        $this->router = $router;
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
     * @param RequestStack $requestStack
     *
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
                $category->getSlug(),
                array(
                    'route' => 'app_frontend_products_category',
                    'routeParameters' => array(
                        'slug' => $category->getSlug(),
                    ),

                    'label' => $category->getName(),
                    'class' => 'nav-item',
                )
            );
            $productsItem->setAttribute('class', 'nav-item');

            if ($category->getSlug() == $requestStack->getCurrentRequest()->get('slug')) {
                $productsItem->setLinkAttribute('class', 'nav-link active');
            } else {
                $productsItem->setLinkAttribute('class', 'nav-link');
            }
        }

        return $menu;
    }
}
