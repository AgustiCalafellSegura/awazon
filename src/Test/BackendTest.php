<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 27/03/18
 * Time: 16:50.
 */

namespace App\Test;

use Liip\FunctionalTestBundle\Test\WebTestCase;

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
        return array(
            array('/admin/dashboard'),
            array('/admin/app/customer/list'),
            array('/admin/app/customer/create'),
            array('/admin/app/customer/1/delete'),
            array('/admin/app/customer/1/show'),
            array('/admin/app/customer/1/edit'),
        );
    }
}
