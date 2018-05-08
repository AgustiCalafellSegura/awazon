<?php

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

    /**
     * @return array
     */
    public function buildURLS()
    {
        return [
            ['/credits'],
            ['/privacy-policy'],
            ['/terms-of-service'],
            ['/product/ab'],
        ];
    }
}
