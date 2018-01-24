<?php
declare(strict_types = 1);
/**
 * /src/Util/Math.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Util;

/**
 * Class Math
 *
 * @package App\Service
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class Math
{
    /**
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    public function sumInt(int $a, int $b): int
    {
        return $a + $b;
    }

    /**
     * @param float $a
     * @param float $b
     *
     * @return float
     */
    public function sumFloat(float $a, float $b): float
    {
        return $a + $b;
    }

    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return mixed
     */
    public function sumLoose($a, $b)
    {
        return $a + $b;
    }

    /**
     * Method to get Fibonacci number
     *
     * @return \Generator
     */
    public function getFibonacci(): \Generator
    {
        $i = 0;
        $k = 1; // first fibonacci value

        yield $k;

        while (true) {
            $k = $i + $k;
            $i = $k - $i;

            yield $k;
        }
    }
}
