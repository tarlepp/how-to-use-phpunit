<?php
declare(strict_types = 1);
/**
 * /tests/Unit/Util/MathTest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Tests\Unit\Util;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class MathTest
 *
 * @package App\Tests\Unit
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class MathTest extends KernelTestCase
{
    /**
     * Note that there is three (3) different 'add' methods just to demonstrate what declare(strict_types = 1);
     * will do - after this you'll always use it.
     */

    public function testThatAddIntReturnsExpected(): void
    {
        static::markTestIncomplete('Implement necessary tests for addInt method');
    }

    public function testThatAddFloatReturnsExpected(): void
    {
        static::markTestIncomplete('Implement necessary tests for addFloat method');
    }

    public function testThatAddLooseReturnsExpected(): void
    {
        static::markTestIncomplete('Implement necessary tests for addLoose method - Good luck to cover all the cases');
    }

    public function testThatGetFibonacciReturnsExpected(): void
    {
        static::markTestIncomplete('Implement necessary tests for getFibonacci method');
    }
}
