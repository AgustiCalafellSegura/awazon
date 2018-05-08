<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 16/2/18
 * Time: 11:34.
 */

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild(
            'Products',
            array(
                'route' => 'app_frontend_product_list',
                'label' => 'Products',
                'current' => 'app_frontend_product_list' == $requestStack->getCurrentRequest()->get('_route'),
            )
        );

        return $menu;
    }
}
