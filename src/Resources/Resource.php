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
     * @var int
     */
    protected $page = 1;

    /**
     * Resource constructor.
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param  int  $page
     * @return $this
     */
    public function setPage(int $page)
    {
        $this->page = $page;
        return $this;
    }
}