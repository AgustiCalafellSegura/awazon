<?php

use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class FrontendTest
 */
class FrontendTest extends WebTestCase
{
    /**
     * Main tests
     *
     * @param $url
     * @dataProvider buildURLS
     */
    public function testMain($url)
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
            ['/credits'],
            ['/privacy-policy'],
            ['/terms-of-service'],
            ['/products'],
            ['/product/matrix'],
        ];
    }
}
