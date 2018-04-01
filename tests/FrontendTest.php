<?php

namespace App\Test;

use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class FrontendTest
 */
class FrontendTest extends WebTestCase
{
    /**
     * Main tests
     */
    public function testMain()
    {
        $client = $this->makeClient();
        $client->request('GET', '/');
        $this->assertStatusCode(200, $client);
    }
}
