<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;

class ProductController extends AbstractController
{
    /**
     * @var array Holds the hardcoded list of products.
     */
    private array $products;

    public function __construct()
    {
        // Initializing hardcoded product data
        $this->products = [
            1 => ['id' => 1, 'name' => 'Laptop', 'price' => 1200.00],
            2 => ['id' => 2, 'name' => 'Mouse', 'price' => 25.00],
        ];
    }

    /**
     * Retrieves product details by ID.
     * 
     * @param int $id The ID of the product to fetch.
     * @param LoggerInterface $logger Service for logging product requests.
     * 
     * @return JsonResponse Returns the product data or a 404 error if not found.
     */
    #[Route('/api/products/{id<\d+>}', name: 'get_product', methods: ['GET'])]
    public function getProduct(int $id, LoggerInterface $logger): JsonResponse
    {
        // Logging the request for debugging and monitoring
        $logger->info("Fetching product with ID: $id");

        // Check if product exists; return 404 if not found
        if (!isset($this->products[$id])) {
            return new JsonResponse(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        // Returning the found product details
        return new JsonResponse($this->products[$id], Response::HTTP_OK);
    }
}
