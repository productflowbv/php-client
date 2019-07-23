<?php

namespace ProductFlow\API\Resources;

class Language extends Resource
{
    /**
     * @return array
     */
    public function list()
    {
        return $this->client->request('GET', 'language');
    }
}