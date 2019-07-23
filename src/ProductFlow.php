<?php

namespace ProductFlow\API;

use ProductFlow\API\Resources\Language;
use ProductFlow\API\Resources\Marketplace;
use ProductFlow\API\Resources\Offer;
use ProductFlow\API\Resources\Order;
use ProductFlow\API\Resources\Product;

class ProductFlow
{
    /**
     * @var Client
     */
    private $client;

    /**
     * ProductFlow constructor.
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Marketplace
     */
    public function marketplace()
    {
        return new Marketplace($this->client);
    }

    /**
     * @return Language
     */
    public function language()
    {
        return new Language($this->client);
    }

    /**
     * @param  string  $locale
     * @return Product
     */
    public function product(string $locale)
    {
        return (new Product($this->client))->setLocale($locale);
    }

    /**
     * @return Offer
     */
    public function offer()
    {
        return new Offer($this->client);
    }

    /**
     * @return Order
     */
    public function order()
    {
        return new Order($this->client);
    }
}