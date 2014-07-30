<?php

namespace Acme\DemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemoControllerTest extends WebTestCase
{
    public function testFooPOST()
    {
        $client = static::createClient();

        $emptyRequest = array();

        $client->request('POST', '/demo/foo', $emptyRequest);        

        $this->assertEquals(400, $client->getResponse()->getStatusCode(), $client->getResponse()->getContent());
    }


}
