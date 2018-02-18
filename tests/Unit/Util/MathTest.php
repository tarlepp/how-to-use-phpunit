<?php
declare(strict_types = 1);
/**
 * /tests/Unit/Util/MathTest.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Tests\Unit\Util;

use App\Util\Math;
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
     * @var Math
     */
    private $mathService;

    /**
     * @dataProvider dataProviderTestThatSumIntReturnsExpected
     *
     * @param int   $expected
     * @param int[] $input
     */
    public function testThatSumIntReturnsExpected(int $expected, array $input): void
    {
        static::assertSame($expected, $this->mathService->sumInt(...$input), 'Sum does not match');
    }

    /**
     * @dataProvider dataProviderTestThatSumFloatReturnsExpected
     *
     * @param float   $expected
     * @param float[] $input
     */
    public function testThatSumFloatReturnsExpected(float $expected, array $input): void
    {
        static::assertSame($expected, $this->mathService->sumFloat(...$input), 'Sum does not match');
    }

    /**
     * @dataProvider dataProviderTestThatSumLooseReturnsExpected
     *
     * @param mixed   $expected
     * @param mixed[] $input
     */
    public function testThatSumLooseReturnsExpected($expected, array $input): void
    {
        static::assertSame($expected, $this->mathService->sumLoose(...$input), 'Sum does not match');
    }

    public function testThatGetFibonacciReturnsExpected(): void
    {
        $series = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765];

        foreach ($this->mathService->getFibonacci() as $index => $value) {
            $expected = \array_shift($series);

            static::assertSame($expected, $value, 'Fibonacci number is not expected');

            if (\count($series) === 0) {
                break;
            }
        }
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->mathService = new Math();
    }

    /**
     * @return array
     */
    public function dataProviderTestThatSumIntReturnsExpected(): array
    {
        return [
            [
                0,
                [0, 0],
            ],
            [
                1,
                [0, 1],
            ],
            [
                3,
                [2, 1],
            ],
            [
                -3,
                [2, -5],
            ],
        ];
    }

    /**
     * @return array
     */
    public function dataProviderTestThatSumFloatReturnsExpected(): array
    {
        return [
            [
                0.0,
                [0.0, 0.0],
            ],
            [
                1.1,
                [0.0, 1.1],
            ],
            [
                3.3,
                [2.1, 1.2],
            ],
            [
                -2.8,
                [2.3, -5.1],
            ],
        ];
    }

    /**
     * @return array
     */
    public function dataProviderTestThatSumLooseReturnsExpected(): array
    {
        return [
            [
                0,
                [null, null],
            ],
            [
                1,
                [null, 1],
            ],
            [
                0,
                [false, false],
            ],
            [
                1,
                [true, false],
            ],
        ];
    }
}
