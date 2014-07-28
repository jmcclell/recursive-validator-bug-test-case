<?php

namespace Acme\DemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemoControllerTest extends WebTestCase
{
    public function testFooAction()
    {
        $client = static::createClient();

        $client->request('POST', '/demo/foo', array());
            

        $this->assertEquals(400, $client->getResponse()->getStatusCode(), $client->getResponse()->getContent());
    }
}
