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
        ];
    }
}
