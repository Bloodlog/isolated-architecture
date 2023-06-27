<?php

namespace Tests\Unit\Product;

use Bloodlog\Src\Product\Entity\Product;
use Bloodlog\Src\Product\Factory\ProductFactoryInterface;
use Bloodlog\Src\Product\Repository\ProductRepositoryInterface;
use Bloodlog\Src\Product\Service\ProductService;
use Mockery;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    /**
     * @covers ProductService::getProductById
     */
    public function testSuccessGetProductById(): void
    {
        $expectedId = 1;
        $expectedName = 'testing';

        $product = new Product();
        $product->id = $expectedId;
        $product->name = $expectedName;
        $mockRepository = Mockery::mock(ProductRepositoryInterface::class);
        $mockRepository->shouldReceive('getProductById')
            ->with(1)
            ->andReturn($product);

        $mockFactory = Mockery::mock(ProductFactoryInterface::class);
        $mockFactory->shouldReceive('foo')->andReturn(42);

        $service = new ProductService($mockRepository, $mockFactory);

        $responseProduct = $service->getProductById(1);

        $this->assertEquals($expectedId, $responseProduct->id);
        $this->assertEquals($expectedName, $responseProduct->name);
    }

    /**
     * @covers ProductService::save
     */
    public function testSuccessSave(): void
    {
        $expectedId = 1;
        $expectedName = 'testing';

        $product = new Product();
        $product->id = $expectedId;
        $product->name = $expectedName;
        $mockRepository = Mockery::mock(ProductRepositoryInterface::class);
        $mockRepository->shouldReceive('save')->andReturn(true);
        $mockFactory = Mockery::mock(ProductFactoryInterface::class);
        $mockFactory->shouldReceive('create')->withAnyArgs()->andReturn($product);

        $service = new ProductService($mockRepository, $mockFactory);

        $this->assertTrue($service->save(['id' => $expectedId, 'name' => $expectedName]));
    }
}