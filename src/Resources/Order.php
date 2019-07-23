<?php

namespace ProductFlow\API\Resources;

class Order extends Resource
{
    /**
     * @return array
     */
    public function list()
    {
        return $this->client->request('GET', 'order');
    }
}