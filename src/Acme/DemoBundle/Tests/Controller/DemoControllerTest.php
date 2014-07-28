<?php

namespace Acme\DemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemoControllerTest extends WebTestCase
{
    public function testFooWithDefaultAction()
    {
        $client = static::createClient();

        $emptyRequest = array();

        $client->request('POST', '/demo/foo-with-default', $emptyRequest);            

        $this->assertEquals(400, $client->getResponse()->getStatusCode(), $client->getResponse()->getContent());
    }

    public function testFooWithoutDefaultAction()
    {
        $client = static::createClient();

        $emptyRequest = array();

        $client->request('POST', '/demo/foo-without-default', $emptyRequest);            

        $this->assertEquals(400, $client->getResponse()->getStatusCode(), $client->getResponse()->getContent());
    }
}
