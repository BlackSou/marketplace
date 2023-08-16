<?php

namespace App\Controller;

use App\DTO\ProductCategoryListResponse;
use App\Service\ProductCategoryServiceInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductCategoryController extends AbstractController
{
    public function __construct(private readonly ProductCategoryServiceInterface $productCategoryService)
    {
    }

    #[Route('/api/v1/categories', name: 'categories', methods: ['GET'])]
    #[OA\Response(response: 200, description: 'Product categories', attachables: [new Model(type: ProductCategoryServiceInterface::class)])]
    public function categories(): Response
    {
        return $this->json($this->productCategoryService->getCategories());
    }
}
