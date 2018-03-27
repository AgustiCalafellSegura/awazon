<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 27/03/18
 * Time: 16:50
 */

namespace App\Test;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class BackendTest extends WebTestCase
{
    public function testContact()
    {
        $client = $this->makeClient();

        $client->request('GET', '/admin');
        $this->assertStatusCode(301, $client);

        $client->request('GET', '/admin/dashboard');
        $this->assertStatusCode(200, $client);
    }
}