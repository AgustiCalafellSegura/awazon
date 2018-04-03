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
            ['/admin/app/orederitem/list'],
            ['/admin/app/orederitem/create'],
            ['/admin/app/orederitem/1/delete'],
            ['/admin/app/orederitem/1/show'],
            ['/admin/app/orederitem/1/edit'],
            ['/admin/app/rating/list'],
            ['/admin/app/rating/create'],
            ['/admin/app/rating/1/delete'],
            ['/admin/app/rating/1/show'],
            ['/admin/app/rating/1/edit'],

        ];
    }
}
