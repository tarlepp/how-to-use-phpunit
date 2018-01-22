<?php
declare(strict_types = 1);

namespace App\Service;

/**
 * Class Math
 *
 * @package App\Service
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
}
