<?php
declare(strict_types=1);
/**
 * /src/Shop/Basket.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Shop;

use App\Model\Product;
use App\Util\Math;
use Ramsey\Uuid\Uuid;

/**
 * Class Basket
 *
 * @package App\Shop
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class Basket
{
    /**
     * @var string
     */
    private $id;

    /**
     * Array of products of current basket
     *
     * @var Product[]
     */
    private $products = [];

    /**
     * @var $math
     */
    private $math;

    /**
     * Basket constructor.
     *
     * @param Math $math
     */
    public function __construct(Math $math)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->math = $math;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product $product
     *
     * @return Basket
     */
    public function addProduct(Product $product): Basket
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * @return float
     */
    public function calculateTotalPrice(): float
    {
        $total = 0.0;

        $iterator = function (Product $product) use (&$total) {
            $total = $this->math->sumFloat($total, $product->getPrice());
        };

        \array_map($iterator, $this->products);

        return $total;
    }

    /**
     * @return string
     */
    public function getProductNames(): string
    {
        $iterator = function (Product $product) {
            return $product->getName();
        };

        return \implode(', ', \array_map($iterator, $this->products));
    }
}
