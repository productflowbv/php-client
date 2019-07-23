<?php

namespace ProductFlow\API\Resources;

use ProductFlow\API\Client;

abstract class Resource
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Resource constructor.
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}