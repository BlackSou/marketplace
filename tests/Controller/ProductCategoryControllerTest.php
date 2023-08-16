<?php

namespace App\Tests\Controller;

use App\Controller\ProductCategoryController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class ProductCategoryControllerTest extends WebTestCase
{

    public function testCategories(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/api/product/categories');

        $this->assertResponseIsSuccessful();
        $jsonResult = json_decode($client->getResponse()->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $this->assertJsonStringEqualsJsonString('{"items":[{"id":"1","title":"A1","slug":"a1"},{"id":"2","title":"A2","slug":"a2"},{"id":"3","title":"A3","slug":"a3"}]}', $jsonResult);
    }
}
