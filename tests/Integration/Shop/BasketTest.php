<?php
declare(strict_types = 1);
/**
 * /tests/Integration/Shop/BasketTest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Tests\Integration\Shop;

use App\Model\Product;
use App\Shop\Basket;
use App\Util\Math;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class BasketTest
 *
 * @package App\Tests\Integration\Shop
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class BasketTest extends KernelTestCase
{
    public function testThatCalculateTotalPriceReturnsExpected(): void
    {
        $basket = new Basket(new Math());
        $basket->addProduct(new Product('Product 1', 10.10));
        $basket->addProduct(new Product('Product 2', 20.35));

        static::assertSame(30.45, $basket->calculateTotalPrice());
    }

    public function testThatGetProductNamesReturnsExpected(): void
    {
        $mathService = $this->createMock(Math::class);

        $product1 = $this->createMock(Product::class);
        $product1
            ->expects(static::once())
            ->method('getName')
            ->willReturn('product 1');

        $product2 = $this->createMock(Product::class);
        $product2
            ->expects(static::once())
            ->method('getName')
            ->willReturn('product 2');

        $basket = (new Basket($mathService))
            ->addProduct($product1)
            ->addProduct($product2);

        static::assertSame('product 1, product 2', $basket->getProductNames());
    }
}
