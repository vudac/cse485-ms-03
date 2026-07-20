<?php
declare(strict_types=1);

class Product
{
    public function __construct(
        public string $sku,
        public string $name,
        public int $categoryId,
        public int $price,
        public int $qty
    ) {
    }

    public function lineTotal(): int
    {
        return $this->price * $this->qty;
    }

    public function stockLevel(): string
    {
        if ($this->qty >= 5) {
            return 'Du';
        }
        if ($this->qty >= 2) {
            return 'Sap het';
        }
        return 'Can nhap';
    }
}