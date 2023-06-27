<?php

namespace Bloodlog\Src\Product\Repository;

use Bloodlog\Src\Product\Entity\ProductInterface;
use Bloodlog\Src\Product\Factory\ProductFactoryInterface;

class ProductRepositoryFile implements ProductRepositoryInterface
{
    public const DATABASE = 'products.json';

    private ProductFactoryInterface $productFactory;

    public function __construct(ProductFactoryInterface $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    public function getProductById(int $int): ProductInterface
    {
        return $this->productFactory->create(['id' => 1, 'name' => 'test']);
    }

    public function save(ProductInterface $product): bool
    {
        return file_put_contents(self::DATABASE, $product);
    }
}