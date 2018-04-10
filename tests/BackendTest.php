<?php

use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class BackendTest
 */
class BackendTest extends WebTestCase
{
    /**
     * @param $url
     * @dataProvider buildURLS
     */
    public function testContact($url)
    {
        $client = $this->makeClient();

        $client->request('GET', $url);
        $this->assertStatusCode(200, $client);
    }

    /**
     * @return array
     */
    public function buildURLS()
    {
        return [
            ['/admin/dashboard'],
            ['/admin/app/customer/list'],
            ['/admin/app/customer/create'],
            ['/admin/app/customer/1/delete'],
            ['/admin/app/customer/1/show'],
            ['/admin/app/customer/1/edit'],
            ['/admin/app/order/list'],
            ['/admin/app/order/create'],
            ['/admin/app/order/1/delete'],
            ['/admin/app/order/1/show'],
            ['/admin/app/order/1/edit'],
            ['/admin/app/orderitem/list'],
            ['/admin/app/orderitem/create'],
            ['/admin/app/orderitem/1/delete'],
            ['/admin/app/orderitem/1/show'],
            ['/admin/app/orderitem/1/edit'],
            ['/admin/app/rating/list'],
            ['/admin/app/rating/create'],
            ['/admin/app/rating/1/delete'],
            ['/admin/app/rating/1/show'],
            ['/admin/app/rating/1/edit'],
            ['/admin/app/provider/list'],
            ['/admin/app/provider/create'],
            ['/admin/app/provider/1/delete'],
            ['/admin/app/provider/1/show'],
            ['/admin/app/provider/1/edit'],
            ['/admin/app/category/list'],
            ['/admin/app/category/create'],
            ['/admin/app/category/1/delete'],
            ['/admin/app/category/1/show'],
            ['/admin/app/category/1/edit'],
            ['/admin/app/product/list'],
            ['/admin/app/product/create'],
            ['/admin/app/product/1/delete'],
            ['/admin/app/product/1/show'],
            ['/admin/app/product/1/edit'],
            ['/admin/app/image/list'],
            ['/admin/app/image/create'],
            ['/admin/app/image/1/delete'],
            ['/admin/app/image/1/show'],
            ['/admin/app/image/1/edit'],
        ];
    }
}
