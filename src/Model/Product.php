<?php
declare(strict_types=1);
/**
 * /src/Model/Product.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Model;

use Ramsey\Uuid\Uuid;

/**
 * Class Product
 *
 * @package App\Model
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class Product
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * Product constructor.
     *
     * @param string $name
     * @param float  $price
     */
    public function __construct(string $name, float $price)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;

        return $this;
    }
}
