<?php

namespace App\Controller;

use App\Exception\ProductCategoryNotFoundException;
use App\Service\ProductServiceInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    public function __construct(private readonly ProductServiceInterface $productService)
    {
    }

    #[Route('/api/v1/category/{id}/products', name: 'products', methods: ['GET'])]
    #[OA\Response(response: 200, description: 'Products in category', attachables: [new Model(type: ProductServiceInterface::class)])]
    public function productsByCategory(int $id): Response
    {
        try {
            return $this->json($this->productService->getProductsByCategory($id));
        } catch (ProductCategoryNotFoundException $exception) {
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }

    }
}
