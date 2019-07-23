<?php

namespace ProductFlow\API\Resources;

class Offer extends Resource
{
    /**
     * @return array
     */
    public function list()
    {
        return $this->client->request('GET', 'offer');
    }
}