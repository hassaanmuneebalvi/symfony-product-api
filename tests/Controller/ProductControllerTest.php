<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    /**
     * Test successful product retrieval.
     * This test checks if the API correctly returns the product details
     * when a valid product ID is provided.
     */
    public function testGetProductSuccess(): void
    {
        // Create a test HTTP client
        $client = static::createClient();

        // Send a GET request to fetch product with ID 1
        $client->request('GET', '/api/products/1');

        // Assert that the response is successful (HTTP 200)
        $this->assertResponseIsSuccessful();

        // Assert that the response format is JSON
        $this->assertResponseFormatSame('json');

        // Decode the JSON response
        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Expected product data
        $expectedData = [
            'id' => 1,
            'name' => 'Laptop',
            'price' => 1200.00 // Ensure float consistency
        ];

        // Assert that the returned product data matches the expected data
        $this->assertEquals($expectedData, $responseData);
    }

    /**
     * Test product not found scenario.
     * This test checks if the API correctly returns a 404 response
     * when a non-existing product ID is requested.
     */
    public function testGetProductNotFound(): void
    {
        // Create a test HTTP client
        $client = static::createClient();

        // Send a GET request for a non-existing product ID (9999)
        $client->request('GET', '/api/products/9999');

        // Assert that the response status code is 404 (Not Found)
        $this->assertResponseStatusCodeSame(404);

        // Decode the JSON response
        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Expected error message
        $expectedError = [
            'message' => 'Product not found'
        ];

        // Assert that the returned error message matches the expected message
        $this->assertEquals($expectedError, $responseData);
    }
}
