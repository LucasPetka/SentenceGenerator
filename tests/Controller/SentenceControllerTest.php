<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use App\Entity\Sentences;

class SentenceControllerTest extends WebTestCase
{

    public function testIndexPage()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function testSentencePageNotFound()
    {
        $client = static::createClient();

        $client->request('GET', '/randomtext666');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isNotFound());
    }

    public function testSentencePageSuccessAndSentenceUpload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $form = $crawler->selectButton('Save sentence')->form();

        // set some values
        $form['form[url]'] = 'randomtext789';

        // submit the form
        $crawler = $client->submit($form);

        $client->request('GET', '/randomtext789');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isSuccessful());
    }


}