<?php

namespace App\DTO;

class ProductListResponse
{
    /**
     * @var ProductListItem[]
     */
    private array $items;

    /**
     * @param ProductListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return ProductListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
