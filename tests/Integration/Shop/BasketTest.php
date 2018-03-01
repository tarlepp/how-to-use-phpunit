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
        static::markTestIncomplete('Write a test for \'calculateTotalPrice\' method in \App\Shop\Basket class - Use multiple products');
    }

    public function testThatGetProductNamesReturnsExpected(): void
    {
        static::markTestIncomplete('Write a test for \'getProductNames\' method in \App\Shop\Basket class - Use mock for dependencies');
    }
}
