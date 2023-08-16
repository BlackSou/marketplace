<?php

namespace App\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ProductCategoryNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Product category not found", Response::HTTP_NOT_FOUND);
    }
}
