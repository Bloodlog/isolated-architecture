<?php

namespace Bloodlog\Src\Product\Service;

use Bloodlog\Src\Product\Entity\ProductInterface;
use Bloodlog\Src\Product\Factory\ProductFactoryInterface;
use Bloodlog\Src\Product\Repository\ProductRepositoryInterface;

class ProductService
{
    private ProductRepositoryInterface $productRepository;
    private ProductFactoryInterface $productFactory;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductFactoryInterface    $productFactory,
    )
    {
        $this->productRepository = $productRepository;
        $this->productFactory = $productFactory;
    }

    public function getProductById(int $id): ProductInterface
    {
        return $this->productRepository->getProductById($id);
    }

    public function save(array $array): bool
    {
        return $this->productRepository
            ->save($this->productFactory->create($array));
    }
}